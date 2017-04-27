<?php

namespace CompBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CompBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('CompBundle:About:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('CompBundle:Contact:index.html.twig');
    }

    public function newsAction()
    {
        return $this->render('CompBundle:News:index.html.twig');
    }

}


