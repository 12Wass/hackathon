<?php

namespace App\Controller;

use App\Entity\Pages;
use App\Form\AdminPagesEditType;
use App\Form\AdminPagesNewType;
use App\Repository\PagesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin/pages")
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class AdminPageController extends AbstractController
{
    /**
     * @Route("/", name="page_list", methods={"GET"})
     * @param PagesRepository $pagesRepository
     * @return Response
     */
    public function index(PagesRepository $pagesRepository): Response
    {
        return $this->render('admin/pages/index.html.twig', [
            'pages' => $pagesRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="page_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {

        $page = new Pages();
        $form = $this->createForm(AdminPagesNewType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($page->getRoute())) {
                $page->setCreatedAt(new \DateTime());
                $this->getDoctrine()->getManager()->persist($page);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Page créée');
                return $this->redirectToRoute('page_list');
            }
            $this->addFlash('error', 'Veuillez saisir une route');
        }

        return $this->render('admin/pages/new.html.twig', [
            'user' => $page,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="page_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Pages $page
     * @return Response
     */
    public function edit(Request $request, Pages $page): Response
    {
        $form = $this->createForm(AdminPagesEditType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $page->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Page modifiée');
            return $this->redirectToRoute('page_list');
        }

        return $this->render('admin/pages/edit.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/delete", name="page_delete", methods={"GET"})
     * @param Pages $page
     * @return Response
     */
    public function delete(Pages $page): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($page);
        $entityManager->flush();
        $this->addFlash('success', 'Page supprimée');
        return $this->redirectToRoute('page_list');
    }

    /**
     * @Route("/test", name="page_test", methods={"GET","POST"})
     * @param Request $request
     * @param PagesRepository $pagesRepository
     * @return Response
     */
    public function test(Request $request, PagesRepository $pagesRepository): Response
    {

        $page = $pagesRepository->findOneBy(['id' => 8]);
        return $this->render('admin/pages/content.html.twig', [
            'page' => $page,
        ]);
    }

    /**
     * @Route("/{id}", name="page_show", methods={"GET"})
     * @param Pages $page
     * @return Response
     */
    public function show(Pages $page): Response
    {
        return $this->render('admin/pages/show.html.twig', [
            'user' => $page,
        ]);
    }
}
