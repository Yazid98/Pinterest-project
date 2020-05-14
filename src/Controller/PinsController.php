<?php

namespace App\Controller;
use App\Entity\Pin;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use SYmfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(EntityManagerInterface $em) :Response
    {
        //Permet de retourner les objects créés
        $repo = $em -> getRepository('App\Entity\Pin');

        $pins = $repo->findAll();

        return $this->render('pins/index.html.twig', compact('pins'));
    }

     /**
     * @Route("/pins/create", name="app_pins_create" ,methods={"GET", "POST"})
     */
     public function create(Request $request, EntityManagerInterface $em):Response
     {

           $form= $this->createFormBuilder()
                 ->add('title:', TextType::class)
                 ->add('description:', TextareaType::class)
                 ->add('CreatePin', SubmitType::class)
                 ->getForm()
                 ;
    
        $form ->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) { 

          $data = $form->getData();
          
          $pin = new Pin;

          $pin->setTitle($data['title']);

          $pin->setDescription($data['description']);

          $em->persist($pin);
          $em->flush();

        }

            return $this->render('pins/create.html.twig', ['monformulaire' =>$form->createView()
                ]);    
     }

}  