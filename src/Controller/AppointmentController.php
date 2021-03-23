<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppointmentController extends AbstractController
{
    /**
     * @Route("/appointment", name="appointment")
     */
    public function index(): Response
    {
        return $this->render('appointment/index.html.twig', [
            'controller_name' => 'AppointmentController',
        ]);
    }

   
   /**
     * @Route("/appointment/showappeintment", name="showappeintment")
     */

      
    public function showappeintment (): Response 
    
    {
      
        $events = [


           ['title'  => 'Adherent ',
           'start'  =>'2021-03-19T10:30:00',
           'end'  =>'2021-03-19T10:45:00'] 
        ];
        return new JsonResponse($events);
            
                
            
            


    }
}
