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
    public function pageAction(Request $request, $num = 1)
    {
        if ($request->query->has('page')) {
            $num = $request->query->get('page');
        }

        $blog = $this->get('smart_blog');

        $offset = ($num > 0)
            ? $blog->getArticlesPerPage() * ($num - 1)
            : 0;

        $articlesPerPage = $blog->getArticlesPerPage();
        $articlesCount   = $blog->getArticlesCountByCategory();
        $articles        = $blog->getArticlesByCategory(null, $articlesPerPage, $offset);

        /*
        $pages_count     = ceil($articlesCount / $articlesPerPage);

        if ($num > $pages_count) {
            return $this->redirect($this->generateUrl('smart_blog_page_index'));
        }

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'articles'              => $articles,
            'pager'                 => [
                'items_per_page' => $articlesPerPage,
                'items_count'    => $articlesCount,
                'pages_count'    => $pages_count,
                'current_page'   => $num,
            ],
        ]);
        */

        $pagerfanta = new Pagerfanta(new FixedAdapter($articlesCount, []));
        $pagerfanta->setMaxPerPage($articlesPerPage);

        try {
            $pagerfanta->setCurrentPage($num);
        } catch(NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl('smart_blog_index'));
        }

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'articles'   => $articles,
            'pagerfanta' => $pagerfanta,
        ]);
    }
}
