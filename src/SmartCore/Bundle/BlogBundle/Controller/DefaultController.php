<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $blog = $this->get('smart_blog');

        $articles = $blog->getArticlesByCategory(null, null, 10);

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'articles' => $articles
        ]);
    }
}
