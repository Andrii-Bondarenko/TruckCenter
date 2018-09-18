<?php

namespace App\Controller;

use App\Entity\Career;
use App\Repository\CareerRepository;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/services", name="services")
     */
    public function servicesAction(Request $request)
    {
        $this->breadcrumbs[] = ['url'=>'','name'=>'Услуги'];
        $this->setup($request,'Услуги');
        return $this->render('pages/content-item/services.html.twig', $this->responseData);
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

}
