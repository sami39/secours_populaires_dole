<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Form\EditAppointmentType;
use App\Repository\AdherentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AppointmentRepository;
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
    public function index(Request $request, AppointmentRepository $appointmentRepository): Response
    {
        $projects = new Appointment();
        $form = $this->createForm(AppointmentType::class);
        $form->handleRequest($request);
        $form->getData();
        
       
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager =$this->getDoctrine()->getManager();
            if (!is_null($request->get("userid")) && $request->get('userid') !== "" ){
                //dd($request->get("userid"));
                $res = $form->getData();
                $result=$appointmentRepository->findBy(['id'=>$request->get('userid')]);
                $result[0]->setAdherents($res->getAdherents());
                $result[0]->setDate($res->getDate());
                $result[0]->setDette($res->getDette());
                $result[0]->setPaye($res->getPaye());
                $entityManager->persist($result[0]);
                $entityManager->flush();
            }
            
           else{
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
            'title'=> $request->get('userid') !=='' &&  !is_null($request->get('userid'))? 'update' : 'ajoute'

        ]);
    }
}}

/**
     * @Route("/calandar/editapointment/{id}", name="editapointment",methods={"GET","POST"})
     */

  /*  public function edit (Request $request, Appointment $appointment): Response
    
        //dd(json_decode($request->getContent(), true));
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
    }*/


