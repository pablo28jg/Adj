<?php

namespace Pablo\AdjWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PabloAdjWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
