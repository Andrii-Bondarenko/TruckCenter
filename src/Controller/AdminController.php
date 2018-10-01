<?php

namespace App\Controller;



use App\Entity\Product;
use Doctrine\DBAL\DBALException;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Content;
/**
 * Base class, extends Easy Admin.
 * Here we can change base functionality of Easy Admin module,
 * add and override base functions.
 *
 * Path prefix (/admin) define in config/routes.yaml for all actions in controller
 *
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends EasyAdminController
{

    /**
     * Génère le sitemap du site.
     *
     * @Route("/sitemap.{_format}", name="front_sitemap", Requirements={"_format" = "xml"})
     */
    public function sitemapAction(Request $request)
    {
        // We define an array of urls
        $urls = [];
        // We store the hostname of our website
        $hostname = $request->getHost();
        $urls[] = ['loc' => $this->get('router')->generate('about'), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => $this->get('router')->generate('contacts'), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => $this->get('router')->generate('service'), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => $this->get('router')->generate('sale'), 'changefreq' => 'weekly', 'priority' => '1.0'];
        $urls[] = ['loc' => $this->get('router')->generate('career'), 'changefreq' => 'weekly', 'priority' => '1.0'];


        $response = new Response($this->renderView('website/sitemap.xml.twig', [
            'urls' => $urls,
            'hostname' => $hostname
        ]));
        $response->headers->set('Content-Type', 'xml');

        return $response;
    }
}

