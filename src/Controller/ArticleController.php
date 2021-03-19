<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/articles/{page}", name="list_article", methods={"GET"})
     */
    public function listArticles(PaginatorInterface $paginator, Request $request, $page = 1, ArticleRepository $articleRepository): Response
    {
        $page = (int)$page;
        if ($page === 0) {
            return $this->redirectToRoute('list_article');
        }
        $articles = $paginator->paginate(
            $articleRepository->findBy(['online' => true], ['id' => 'DESC']),
            $request->query->getInt('page', $page),
            9
        );
        $articles->setTemplate('public/article/_pagination.html.twig');

        return $this->render('public/article/listArticles.html.twig', [
            'articles' => $articles
        ]);
    }


    /**
     * @Route ("/article/{slug}", name="show_article")
     */
    public function show(Article $article)
    {
        return $this->render('public/article/article.html.twig', [
            "article" => $article,
        ]);
    }

    public function lastArticles(ArticleRepository $articleRepository)
    {
        return $this->render('public/article/_widgetLastArticle.html.twig', [
            'articles' => $articleRepository->findBy(['online' => 1], ['id' => 'DESC'], 3),
        ]);
    }
}
