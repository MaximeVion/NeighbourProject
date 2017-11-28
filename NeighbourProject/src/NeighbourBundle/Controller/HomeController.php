<?php

namespace NeighbourBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('NeighbourBundle:Home:index.html.twig');
    }
}
