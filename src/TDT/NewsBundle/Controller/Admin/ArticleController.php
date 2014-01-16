<?php

namespace TDT\NewsBundle\Controller\Admin;

use SmartCore\Bundle\BlogBundle\Controller\Admin\ArticleController as BaseArticleController;

class ArticleController extends BaseArticleController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->articleServiceName    = 'tdt_news.article';
        $this->routeAdminArticle     = 'tdt_news_admin_index';
        $this->routeAdminArticleEdit = 'tdt_news_admin_edit';
        $this->bundleName            = 'TDTNewsBundle';
    }
}
