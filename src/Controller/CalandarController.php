<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Form\EditAppointmentType;
use App\Repository\AdherentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AppointmentRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalandarController extends AbstractController
{
    /**
     * @Route("/calandar", name="calandar",methods={"GET"})
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(AppointmentType::class);

        return $this->render('calandar/calandar.html.twig');
    }




}
