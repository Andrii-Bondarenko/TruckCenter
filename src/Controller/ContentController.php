<?php

namespace App\Controller;

use App\Entity\Career;
use App\Repository\CareerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController extends BaseController
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('pages/index/index.html.twig', $this->responseData);
    }


    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'О компании'];
        $this->setup($request,'О компании');
        return $this->render('pages/content-item/about.html.twig', $this->responseData);
    }

    /**
     * @Route("/service", name="service")
     */
    public function servicesAction(Request $request)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'Сервис'];
        $this->setup($request,'Сервис');
        return $this->render('pages/content-item/services.html.twig', $this->responseData);
    }


    /**
     * @Route("/sale", name="sale")
     */
    public function saleAction(Request $request)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'Продажа'];
        $this->setup($request,'Продажа');
        return $this->render('pages/content-item/sale.html.twig', $this->responseData);
    }

    /**
     * @Route("/career", name="career")
     */
    public function careerAction(Request $request)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'Вакансии'];
        $this->setup($request,'Вакансии');

        $this->responseData['data'] = $this->getDoctrine()->getRepository(Career::class)->findAll();
        return $this->render('pages/content-item/career.html.twig', $this->responseData);
    }

    /**
     *
     * @Route("/{any}", name="any")
     */
    public function redirectRoute($any) {
        switch (strtolower($any)) {
            case 'contacts': {
                return $this->redirectToRoute('contacts',array() ,301);
            }
            case 'sale': {
                return $this->redirectToRoute('sale',array() ,301);
            }
            case 'service': {
                return $this->redirectToRoute('service',array() ,301);
            }
            case 'career': {
                return $this->redirectToRoute('career',array() ,301);
            }
            case 'about': {
                return $this->redirectToRoute('about',array() ,301);
            }
            default : {
                throw new NotFoundHttpException('Sorry not existing!');
            }
        }

        throw new NotFoundHttpException('Sorry not existing!');
    }

}
