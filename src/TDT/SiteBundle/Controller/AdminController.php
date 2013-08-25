<?php

namespace TDT\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TDTSite/Admin/index.html.twig', [

        ]);
    }
}
