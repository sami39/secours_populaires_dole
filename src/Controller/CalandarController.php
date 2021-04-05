<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Form\EditAppointmentType;
use App\Repository\AdherentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalandarController extends AbstractController
{
    /**
     * @Route("/calandar", name="calandar",methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $projects = new Appointment();
        $form = $this->createForm(AppointmentType::class);
        $form->handleRequest($request);
        $form->getData();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager =$this->getDoctrine()->getManager();
            
            $res = $form->getData();
            $projects->setAdherents($res->getAdherents());
            $projects->setDate($res->getDate());
            $projects->setDette($res->getDette());
            $projects->setPaye($res->getPaye());
             
            $entityManager->persist($projects);
            $entityManager->flush();
            
             
        }
        return $this->render('calandar/calandar.html.twig', [
            'controller_name' => 'CalandarController',
            'form' => $form->createView(),
        ]);
    }

/**
     * @Route("/calandar/editapointment/{id}", name="editapointment",methods={"GET","POST"})
     */

    public function edit (Request $request, Appointment $appointment): Response
    {
        dd(json_decode($request->getContent(), true));
        $form = $this->createForm(EditAppointmentType ::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $entityManager =$this->getDoctrine()->getManager();
            $entityManager->persist( $appointment);
            $entityManager->flush();


        }
        return $this->render('calandar/_edit_appointment_dialog.html.twig', [
            'controller_name' => 'CalandarController',
            'form' => $form->createView(), 
        ]);
    }

}
