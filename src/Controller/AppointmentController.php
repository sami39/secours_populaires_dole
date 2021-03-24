<?php

namespace App\Controller;

use App\Repository\AppointmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
}
