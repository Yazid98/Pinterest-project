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

        var_dump($pin);

        return $this->render('pins/index.html.twig');
    }
}