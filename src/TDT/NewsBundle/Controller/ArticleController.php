<?php

namespace TDT\NewsBundle\Controller;

use SmartCore\Bundle\BlogBundle\Controller\ArticleController as BaseArticleController;

class ArticleController extends BaseArticleController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->articleServiceName   = 'tdt_news.article';
        $this->routeIndex           = 'tdt_news_index';
        $this->routeArticle         = 'tdt_news_article';
        $this->bundleName           = 'TDTNewsBundle';
    }
}
