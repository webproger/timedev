<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function showAction($slug)
    {
        return $this->render('SmartBlogBundle::article.html.twig', [
            'article' => $this->get('smart_blog')->getArticleBySlug($slug),
        ]);
    }

    public function pageAction($num = 1)
    {
        $blog = $this->get('smart_blog');

        $offset = ($num > 0)
            ? $blog->getArticlesPerPage() * ($num - 1)
            : 0;

        $articlesPerPage = $blog->getArticlesPerPage();
        $articlesCount   = $blog->getArticlesCountByCategory();
        $articles        = $blog->getArticlesByCategory(null, $articlesPerPage, $offset);

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
    }
}
