<?php

namespace App\Controller;

use App\Form\AppointmentType;
use App\Repository\AdherentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalandarController extends AbstractController
{
    /**
     * @Route("/calandar", name="calandar")
     */
    public function index(): Response
    {
        $form = $this->createForm(AppointmentType::class);

        return $this->render('calandar/calandar.html.twig', [
            'controller_name' => 'CalandarController',
            'form' => $form->createView(),
        ]);
    }
}
