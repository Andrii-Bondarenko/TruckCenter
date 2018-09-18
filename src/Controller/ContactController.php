<?php

namespace App\Controller;

use App\Entity\FeedbackFooter;
use App\Form\Type\FeedbackContactType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends BaseController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function indexAction(Request $request, ObjectManager $manager)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'Контакты'];
        $this->setup($request,'Контакты');

        $form = $this->createForm(FeedbackContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var FeedbackContact $data */
            $data = $form->getData();
            $manager->persist($data);
            $manager->flush();

           /* $message = (new \Swift_Message('Обратная связь (контакты)'))
                ->setFrom('atmosfera93@yandex.ru')
                ->setTo('info@atmosfera93.ru')
                ->setBody( $this->renderView(
                    'emails/feedbackContact.html.twig',
                    array(
                        'name' => $data->getFirstName(),
                        'phone' => $data->getPhone(),
                        'message' => $data->getComment(),
                    )
                ),'text/html');

            $this->get('mailer')->send($message);*/
            $this->addFlash(
                'notice',
                'Заявка отправлена.'
            );
            return $this->redirectToRoute('contacts');
        }
        $this->responseData['form'] = $form->createView();

        return $this->render('pages/contacts/contacts.html.twig', $this->responseData);
    }

    /**
     * @Route("/feedback", name="feedback-footer")
     */
    public function feedbackFooter(Request $request, ObjectManager $manager)
    {
        if(!$request->isXmlHttpRequest()) {
            throw new Exception('Not Fount',404);
        }

        $phone = $request->request->get('phone');
        if(empty($phone)) {return  new Response(json_encode(['message'=>"Введите телефон",'type'=>'error']));}
        if(mb_strlen($phone,'utf-8')>20) {return new Response( json_encode([
            'message'=>"Поле должно иметь меньше 20 символов",'type'=>'error'
        ]));}
        $feedback = new FeedbackFooter();

        $feedback->setPhone($phone);
        $manager->persist($feedback);
        $manager->flush();
        return  new Response(json_encode(['message'=>"Вам перезвонят в ближайшее время",'type'=>'success']));
    }



}
