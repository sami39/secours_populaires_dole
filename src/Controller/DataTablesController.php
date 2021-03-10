<?php

namespace App\Controller;
 
 
use App\Entity\Adherents;
use App\Form\AdherentType;
use App\Repository\AdherentsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataTablesController extends AbstractController
{
    /**
     * @Route("/data/tables", name="data_tables")
     */
    public function AficheAdhrent(AdherentsRepository $AdherentsRepository): Response
    { $Adherents = $AdherentsRepository->findAll();
      
        return $this->render('data_tables/adherents.html.twig', [
          'Adherents' => $Adherents,
           

        ]);
    }



    


/**
   * @Route("deleteadherent/{id}", name="delete_adherent")
   */
  public function delete(Request $request, Adherents $projects): Response
  {

    $entityManager = $this->getDoctrine()->getManager();





    $entityManager->remove($projects);
    $entityManager->flush();
    return $this->redirectToRoute('data_tables');
  }

 /**
   * @Route("/AjoutAdhrent", name="Addadherent")
   */

  public function AjoutAdhrent(Request $request, AdherentsRepository $adherentsRepository)
  {
    $projects = new Adherents();
    $form = $this->createForm(AdherentType::class, $projects);
    $form->handleRequest($request);
    $projets = $adherentsRepository->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($projects);
      $entityManager->flush();
      return $this->redirectToRoute('data_tables');
    }

    return $this->render('data_tables/addAdherent.html.twig',[
      'form' => $form 
    
    ]);
   




}
}
