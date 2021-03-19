<?php

namespace App\Controller;

use App\Entity\AnnuaireRegions;
use App\Entity\Pages;
use App\Entity\Annuaire;
use App\Form\AdminAnnuaireEditType;
use App\Form\AdminAnnuaireNewType;
use App\Form\AdminAnnuaireRegionNewType;
use App\Repository\AnnuaireRegionsRepository;
use App\Repository\AnnuaireRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Asset\Packages;
/**
 * @Route("/admin/annuaire")
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class AdminAnnuaireController extends AbstractController
{
    /**
     * @Route("/", name="annuaire_list", methods={"GET"})
     * @param AnnuaireRepository $annuaireRepository
     * @return Response
     */
    public function index(AnnuaireRepository $annuaireRepository): Response
    {
        return $this->render('admin/annuaire/index.html.twig', [
            'trainers' => $annuaireRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="annuaire_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {

        $annuaire = new Annuaire();
        $form = $this->createForm(AdminAnnuaireNewType::class, $annuaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($annuaire->getFirstName()) && !empty($annuaire->getLastName()) && !empty($annuaire->getFunction())) {
                $annuaire->setCreatedAt(new \DateTime());
                $this->getDoctrine()->getManager()->persist($annuaire);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Page créée');
                return $this->redirectToRoute('annuaire_list');
            }
            $this->addFlash('error', 'Veuillez saisir un nom, prénom et une fonction');
        }

        return $this->render('admin/annuaire/new.html.twig', [
            'trainer' => $annuaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="annuaire_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Annuaire $annuaire
     * @return Response
     */
    public function edit(Request $request, Annuaire $annuaire): Response
    {
        $form = $this->createForm(AdminAnnuaireEditType::class, $annuaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Page modifiée');
            return $this->redirectToRoute('page_list');
        }

        return $this->render('admin/annuaire/edit.html.twig', [
            'trainer' => $annuaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="annuaire_delete", methods={"GET"})
     * @param Annuaire $annuaire
     * @return Response
     */
    public function delete(Annuaire $annuaire): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($annuaire);
        $entityManager->flush();
        $this->addFlash('success', 'Formateur supprimé');
        return $this->redirectToRoute('annuaire_list');
    }

    /**
     * @Route("/{id}", name="annuaire_show", methods={"GET"})
     * @param Pages $page
     * @return Response

    public function show(Pages $page): Response
    {
        return $this->render('admin/pages/show.html.twig', [
            'user' => $page,
        ]);
    }
    */

    /* Annuaire Regions */

    /**
     * @Route("/region", name="annuaire_region_list", methods={"GET"})
     * @param AnnuaireRegionsRepository $annuaireRegionRepository
     * @return Response
     */
    public function index_region(AnnuaireRegionsRepository $annuaireRegionRepository): Response
    {

        return $this->render('admin/annuaire_region/index.html.twig', [
            'regions' => $annuaireRegionRepository->findAll()
        ]);
    }

    /**
     * @Route("/region/new", name="annuaire_region_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new_region(Request $request): Response
    {

        $annuaireRegion = new AnnuaireRegions();
        $form = $this->createForm(AdminAnnuaireRegionNewType::class, $annuaireRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty(!empty($annuaireRegion->getName()))) {
                $annuaireRegion->setCreatedAt(new \DateTime());
                $this->getDoctrine()->getManager()->persist($annuaireRegion);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Région créée');
                return $this->redirectToRoute('annuaire_region_list');
            }
            $this->addFlash('error', 'Veuillez saisir un nom de région');
        }

        return $this->render('admin/annuaire_region/new.html.twig', [
            'region' => $annuaireRegion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/region/{id}/edit", name="annuaire_region_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Annuaire $annuaire
     * @return Response
     */
    public function edit_region(Request $request, Annuaire $annuaire): Response
    {
        $form = $this->createForm(AdminAnnuaireEditType::class, $annuaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Page modifiée');
            return $this->redirectToRoute('page_list');
        }

        return $this->render('admin/annuaire/edit.html.twig', [
            'trainer' => $annuaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/region/{id}/delete", name="annuaire_region_delete", methods={"GET"})
     * @param AnnuaireRegions $annuaireRegions
     * @return Response
     */
    public function delete_region(AnnuaireRegions $annuaireRegions): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($annuaireRegions);
        $entityManager->flush();
        $this->addFlash('success', 'Région supprimée');
        return $this->redirectToRoute('annuaire_region_list');
    }

}
