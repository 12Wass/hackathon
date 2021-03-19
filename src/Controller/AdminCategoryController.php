<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\AdminCategoryType;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categories")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminCategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_list", methods={"GET"})
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('admin/category/index.html.twig', [
            'categories' => $categoryRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/nouveau", name="category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(AdminCategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $category->setCreatedAt(new \DateTime());
            $entityManager->persist($category);
            $entityManager->flush();
            $this->addFlash('success', 'Categorie créée');
            return $this->redirectToRoute('category_list');
        }

        return $this->render('admin/category/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Category $category): Response
    {
        $form = $this->createForm(AdminCategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Category modifiée');
            return $this->redirectToRoute('category_list');
        }

        return $this->render('admin/category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="category_delete", methods={"GET"})
     */
    public function delete(Category $category): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($category);
        $entityManager->flush();
        $this->addFlash('success', 'Categorie supprimée');
        return $this->redirectToRoute('category_list');
    }
}
