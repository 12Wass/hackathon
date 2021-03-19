<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('public/home/index.html.twig');
    }

    /**
     * @Route("/devenir-formateur-interne", name="devenir_formateur_interne")
     */
    public function becomeFormateur(): Response
    {
        return $this->render('public/pages/devenirFormateur.html.twig');
    }

    /**
     * @Route("/ressources-reglementaires", name="ressources_reglementaires")
     */
    public function ressourcesReglementaires(): Response
    {
        return $this->render('public/pages/ressourcesReglementaires.html.twig');
    }
}
