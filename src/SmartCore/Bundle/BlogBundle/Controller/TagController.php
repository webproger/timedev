<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function indexAction()
    {
        $blog = $this->get('smart_blog');

        $cloud = [];
        $tags = $blog->getTagsCloud();

        foreach ($tags as $tag) {
            $cloud[] = [
                'count' => $blog->getArticlesCountByTag($tag),
                'tag'   => $tag,
            ];
        }

        return $this->render('SmartBlogBundle::tags.html.twig', [
            'cloud' => $cloud,
        ]);
    }

    public function showArticlesAction($slug)
    {
        $blog = $this->get('smart_blog');

        $tag = $blog->getTagBySlug($slug);

        $articles = $blog->getArticlesByTag($tag);

        $count = $blog->getArticlesCountByTag($tag);

        return $this->render('SmartBlogBundle::articles_by_tag.html.twig', [
            'articles' => $articles,
            'count'    => $count,
            'tag'      => $tag,
        ]);
    }
}
