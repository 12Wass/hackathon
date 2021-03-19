<?php


namespace App\Controller;

use App\Entity\Annuaire;
use App\Entity\AnnuaireRegions;
use App\Repository\AnnuaireRegionsRepository;
use App\Repository\AnnuaireRepository;
use Knp\Component\Pager\PaginatorInterface;
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

    /**
     * @Route("/annuaire/{page}", name="list_formateurs", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param int $page
     * @param AnnuaireRepository $annuaireRepository
     * @return Response
     */
    public function listFormateurs(PaginatorInterface $paginator, Request $request, $page = 1, AnnuaireRepository $annuaireRepository): Response
    {
        $page = (int)$page;
        if ($page === 0) {
            return $this->redirectToRoute('list_article');
        }
        $formateurs = $paginator->paginate(
            $annuaireRepository->findBy(array(), array('id' => 'DESC')),
            $request->query->getInt('page', $page),
            9
        );
        $formateurs->setTemplate('public/annuaire/_pagination.html.twig');

        return $this->render('public/annuaire/listFormateurs.html.twig', [
            'formateurs' => $formateurs
        ]);
    }

    /**
     * @Route("/annuaire/formateurs/{region}", name="list_formateurs_region", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param int $page
     * @param AnnuaireRepository $annuaireRepository
     * @param AnnuaireRegionsRepository $annuaireRegionsRepository
     * @param $region
     * @return Response
     */
    public function listFormateursByRegion(PaginatorInterface $paginator, Request $request, $page = 1, AnnuaireRepository $annuaireRepository, AnnuaireRegionsRepository $annuaireRegionsRepository,  $region): Response
    {
        $page = (int)$page;
        if ($page === 0) {
            return $this->redirectToRoute('list_formateurs_region');
        }
        if ($region == "all"){
            $formateurs = $paginator->paginate(
                $annuaireRepository->findAll(),
                $request->query->getInt('page', $page),
                9
            );
        } else {
            $formateurs = $paginator->paginate(
                $annuaireRepository->findBy(['region' => $region], ['id' => 'DESC']),
                $request->query->getInt('page', $page),
                9
            );
        }
        $formateurs->setTemplate('public/annuaire/_pagination.html.twig');

        return $this->render('public/annuaire/listFormateurs.html.twig', [
            'formateurs' => $formateurs
        ]);
    }

}
