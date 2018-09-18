<?php

namespace App\Controller;

use App\Entity\FeedbackSaleOrder;
use App\Entity\Meta;
use App\Form\Type\FeedbackSaleOrderType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use App\Entity\Content;
use Symfony\Component\HttpFoundation\Session\Session;

class BaseController extends Controller
{
    public $responseData = [];
    /**
     * @var EntityManager $em
     */
    public $em;

    protected $breadcrumbs = [];

    protected $meta = [];

    function __construct()
    {
        $this->breadcrumbs[] = ['url'=>'/','name'=>'Главная'];
        $this->meta = [
            'title'=>'',
            'keywords'=>'',
            'description'=>''
        ];

    }

    public function setup(Request $request, $name=null)
    {
        $this->responseData['breadcrumbs'] = $this->breadcrumbs;
        $this->responseData['nameContent'] = $name;
        $this->responseData['title'] = $name;
    }




}
