<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class PageController extends AbstractController
{

    /**
     * @Route("/", name="searchDispositif")
     */
    public function searchDispositif(): Response
    {
        return $this->render('public/page/searchDispositif.html.twig');
    }

    /**
     * @Route("/", name="allDispositif")
     */
    public function allDispositif(): Response
    {
        return $this->render('public/page/allDispositif.html.twig');
    }

    /**
     * @Route("/", name="catalog")
     */
    public function catalog(): Response
    {
        return $this->render('public/page/catalog.html.twig');
    }

    /**
     * @Route("/", name="becomeTrainer")
     */
    public function becomeTrainer(): Response
    {
        return $this->render('public/page/becomeTrainer.html.twig');
    }

    /**
     * @Route("/", name="directory")
     */
    public function directory(): Response
    {
        return $this->render('public/page/directory.html.twig');
    }

    /**
     * @Route("/", name="regulatoryResources")
     */
    public function regulatoryResources(): Response
    {
        return $this->render('public/page/regulatoryResources.html.twig');
    }
}
