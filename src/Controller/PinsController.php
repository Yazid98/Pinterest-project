<?php

namespace App\Controller;
use App\Entity\Pin;
use Doctrine\ORM\EntityManagerInterface;
use SYmfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(EntityManagerInterface $em) :Response
    {

        $repo = $em -> getRepository('App\Entity\Pin');

        $pins = $repo->findAll();

        return $this->render('pins/index.html.twig', compact('pins'));
    }

     /**
     * @Route("/pins/create")
     */
     public function create(){

            return $this->render('pins/create.html.twig');
        
        }


}  