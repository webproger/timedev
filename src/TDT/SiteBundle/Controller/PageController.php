<?php

namespace TDT\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TDT\SiteBundle\Entity\Mail;

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

    public function mailAction()
    {
        $request = $this->getRequest();
        $mail = new Mail();

        echo $request->request->get('name');

        $mail->setName($request->request->get('name'));
        $mail->setEmail($request->request->get('email'));
        $mail->setMessage($request->request->get('msg'));

        mail('jobmail@ro.ru', 'msg', $request->request->get('msg'));

//        return $this->render('TDTSiteBundle:Page:contacts.html.twig');
    }
}
