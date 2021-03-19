<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\AdminArticleType;
use App\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/articles")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_list", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('admin/article/index.html.twig', [
            'articles' => $articleRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/nouveau", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(AdminArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $article->setContent($request->request->get('contenthidden'))
                ->setModifyAt(null)
                ->setCreatedAt(new \DateTime());
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', 'Article créer');
            return $this->redirectToRoute('article_list');
        }

        return $this->render('admin/article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(AdminArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setModifyAt(new \DateTime())
                ->setContent($request->request->get('contenthidden'));
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Article modifié');
            return $this->redirectToRoute('article_list');
        }

        return $this->render('admin/article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="article_delete", methods={"GET"})
     */
    public function delete(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        $this->addFlash('success', 'Article supprimé');
        return $this->redirectToRoute('article_list');
    }
}
