<?php


namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(ArticleRepository $articleRepository): Response
    {
        return $this->render('public/home/index.html.twig', [
            'articles' => $articleRepository->findBy(['online' => 1], ['id' => 'DESC'], 3),
        ]);
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

    /**
     * @Route("/dispositifs-de-formation", name="dispositif_formation")
     */
    public function dispositifFormation(): Response
    {
        return $this->render('public/pages/dispositifFormation.html.twig');
    }
}
