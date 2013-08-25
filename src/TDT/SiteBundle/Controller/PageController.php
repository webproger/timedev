<?php

namespace TDT\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('TDTSiteBundle:Page:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('TDTSiteBundle:Page:about.html.twig');
    }

    public function contactsAction()
    {
        return $this->render('TDTSiteBundle:Page:contacts.html.twig');
    }
}
