<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


    public function showappeintment(AppointmentRepository $appointmentRepository, SerializerInterface $serializer): Response
    {

        $appointments = $appointmentRepository->findAll();

        return new Response($serializer->serialize($appointments, 'json', ['groups' => ['Appointment:list']]));
    }

    /**
     * @Route("/appointment/create", name="create_appointment", methods={"GET","POST"})
     * @Route("/appointment/{id}/edit", name="edit_appointment", methods={"GET","POST"})
     */
    public function save(Request $request, Appointment $appointment = null)
    {
        $form = $this->createForm(AppointmentType::class, $appointment);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
            return $this->redirectToRoute('calandar');
        }

        return $this->render('appointment/_appointment_form.html.twig', [
            'form' => $form->createView(),
            'appointment' => $appointment,
        ]);
    }


    
    /**
     * @Route("appointment/{id}/delete", name="delete_appointment")
     */
    public function delete(Request $request, Appointment $appointment): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($appointment);
        $entityManager->flush();
        return $this->redirectToRoute('calandar');
    }
}

