<?php

namespace TDT\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TDTDemoBundle:Default:index.html.twig', array('name' => $name));
    }
}
