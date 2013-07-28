<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Pagerfanta\Adapter\FixedAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function showAction($slug)
    {
        return $this->render('SmartBlogBundle::article.html.twig', [
            'article' => $this->get('smart_blog')->getArticleBySlug($slug),
        ]);
    }

    /**
     * @param Request $request
     * @param int $num
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function pageAction(Request $request, $page = 1)
    {
        if ($request->query->has('page')) {
            $page = $request->query->get('page');
        }

        $blog = $this->get('smart_blog');

        $articlesPerPage = $blog->getArticlesPerPage();
        $offset          = ($page > 0) ? $articlesPerPage * ($page - 1) : 0;
        $articles        = $blog->getArticlesByCategory(null, $articlesPerPage, $offset);
        $articlesCount   = $blog->getArticlesCountByCategory();

        $pagerfanta = new Pagerfanta(new FixedAdapter($articlesCount, $articles));
        $pagerfanta->setMaxPerPage($articlesPerPage);

        try {
            $pagerfanta->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl('smart_blog_index'));
        }

        return $this->render('SmartBlogBundle::articles.html.twig', [
            //'articles'   => $articles,
            'pagerfanta' => $pagerfanta,
        ]);
    }
}
