<?php

namespace App\Controller;
 
 
use App\Entity\Adherents;
use App\Form\AdherentType;
use App\Form\SearchaderentsType;
use App\Repository\AdherentsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataTablesController extends AbstractController
{
    /**
     * @Route("/data/tables/", name="data_tables" , methods={"GET","POST"})
     */
    public function AficheAdhrent(AdherentsRepository $AdherentsRepository,request $request): Response
    {
     
      $Adherents = $AdherentsRepository->findAll();
      $form = $this->createForm(SearchaderentsType::class);

     
      $result=[];
      
      if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
      
          $datas = $form->getData();
           $Adherent = $datas->getNomPrenom(); 
        $result=$AdherentsRepository->search($Adherent) ;
        
            
        
         
      }
        return $this->render('data_tables/adherents.html.twig', [
          'Adherents' => $Adherents,
          'search' =>$form->createView() ,
          'result' =>$result
 
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
    setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8'); 
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
      'form' => $form->createView()
    
    ]);
   




}
 /**
   * @Route("/editAdherent/{id}", name="editAdherent")
   */

  public function edit(Request $request, Adherents $projects): Response
  {

    $entityManager = $this->getDoctrine()->getManager();


    $form = $this->createForm(AdherentType::class, $projects);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $entityManager->persist($projects);
      $entityManager->flush();
      return $this->redirectToRoute('data_tables');
    }
    return $this->render('data_tables/editAdhrent.html.twig',[
      'form' => $form->createView()
      ]);
  }
      
    }
  





