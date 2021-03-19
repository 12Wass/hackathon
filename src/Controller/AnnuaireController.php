<?php


namespace App\Controller;

use App\Entity\Annuaire;
use App\Entity\AnnuaireRegions;
use App\Repository\AnnuaireRegionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnuaireController extends AbstractController
{
    /**
     * @Route("/annuaire", name="annuaire")
     * @param AnnuaireRegionsRepository $annuaireRegions
     * @return Response
     */
    public function home(AnnuaireRegionsRepository $annuaireRegions): Response
    {
        return $this->render('public/annuaire/index.html.twig', [
            'regions' => $annuaireRegions->findAll()
        ]);
    }

}
