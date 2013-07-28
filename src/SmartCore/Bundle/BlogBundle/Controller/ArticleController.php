<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use SmartCore\Bundle\BlogBundle\Pagerfanta\SimpleDoctrineORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function showAction($slug)
    {
        return $this->render('SmartBlogBundle::article.html.twig', [
            'article' => $this->get('smart_blog')->getArticleBySlug($slug),
        ]);
    }

    /**
     * @param int $num
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function pageAction($page = 1)
    {
        $blog = $this->get('smart_blog');

        $pagerfanta = new Pagerfanta(new SimpleDoctrineORMAdapter($blog->getFindByCategoryQuery()));
        $pagerfanta->setMaxPerPage($blog->getArticlesPerPage());

        try {
            $pagerfanta->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl('smart_blog_index'));
        }

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'pagerfanta' => $pagerfanta,
        ]);
    }
}
