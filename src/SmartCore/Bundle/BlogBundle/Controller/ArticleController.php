<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $blog = $this->get('smart_blog');

        $articles = $blog->getLastArticles();

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'articles' => $articles,
            'count'    => $blog->getArticlesCountByCategory(),
        ]);
    }

    public function showAction($slug)
    {
        $blog = $this->get('smart_blog');

        $article = $blog->getArticleBySlug($slug);

        return $this->render('SmartBlogBundle::article.html.twig', [
            'article' => $article
        ]);
    }
}
