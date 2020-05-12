<?php

namespace App\Controller;
use App\Entity\Pin;
use SYmfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index() :Response
    {
        $pin = new Pin;

       

        return $this->render('pins/index.html.twig');
    }
}
