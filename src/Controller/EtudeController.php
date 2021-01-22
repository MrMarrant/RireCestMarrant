<?php

namespace App\Controller;


use App\Entity\Etude;
use App\Entity\PlageHasEtude;
use App\Entity\Plage;
use App\Entity\Zone;
use App\Form\EtudeType;
use App\Form\ZoneType;
use App\Form\PlageHasEtudeType;
use App\Form\PlageFormForPHEType;
use App\Form\UpdateDateType;
use App\Form\UpdateParticipantType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudeController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('html/index.html.twig');
    }

    /**
     * @Route("/pagemarrante", name="pagemarrante")
     */
    public function pageDuRire()
    {
        return $this->render('html/pageDuRire.html.twig');
    }


    /**
     * @Route("/etude", name="etudes")
     */
    public function Etude()
    {
        $repository=$this->getDoctrine()->getRepository(Etude::class);
        $etude= $repository->findAll();

        $dateEtude =array();

        foreach ($etude as $date){
            $valueDate = $date->getDateetude()->format('d-m-Y');
            array_push($dateEtude,$valueDate );
        }

        return $this->render('etude/index.html.twig', [
            "etudes"=>$etude,
            "dates"=>$dateEtude,
        ]);
    }    

     /**
     * @Route("/etude/etude_has_plages", name="etude_has_plage")
     */
    public function PlageDeLetude($id,$etude)
    {
        $repository=$this->getDoctrine()->getRepository(Etude::class);
        $etude_has_plage= $repository->findAll($id);

        return $this->render('etude/etude_has_plage.html.twig', [
            "etudes"=>$etude,
        ]);
    }   
    
      /**
     * @Route("/etude/update_date/{idEtude}", name="update_date")
     */
    public function UpdateDate($idEtude,Request $request)
    {
        $etude = new Etude();

        $error_update = false;

        $form= $this->createForm(UpdateDateType::class, $etude);
        $form->handleRequest($request);
        $repository_etude=$this->getDoctrine()->getRepository(Etude::class);
        $etude= $repository_etude->find($idEtude);
        if($form->isSubmitted() && $form->isValid() )
        {
            if($form->get('dateetude')->getData() != NULL)
            {
                $nouvelleDate = $form->get('dateetude')->getData();
                $etude->setDateetude($nouvelleDate);

                $em = $this->getDoctrine()->getManager();
                $em->persist($etude);
                $em->flush();

                return $this->redirectToRoute("etudes");
            }

            else
                {
                $error_update = true;
                }
        }  

        
        
        return $this->render('etude/update_date.html.twig', [
            "etudes"=>$etude,
            'form' => $form->createView(),
            'error_update'=> $error_update,
        ]);
    }

      /**
     * @Route("/etude/update_participant/{idEtude}", name="update_participant")
     */
    public function UpdateParticipant($idEtude,Request $request)
    {
        $etude = new Etude();

        $form= $this->createForm(UpdateParticipantType::class, $etude);
        $form->handleRequest($request);
        $repository_etude=$this->getDoctrine()->getRepository(Etude::class);
        $etude= $repository_etude->find($idEtude);
        if($form->isSubmitted() && $form->isValid() )
        { 
            $nombreDeParticipant = $form->get('totalpersonneetude')->getData();
            $etude->setTotalpersonneetude($nombreDeParticipant);
            $em=$this->getDoctrine()->getManager();
            $em->persist($etude);
            $em->flush(); 

            return $this->redirectToRoute("etudes");
        }  

        
        
        return $this->render('etude/update_participant.html.twig', [
            "etudes"=>$etude,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/etude/ajout_etude", name="ajout_etude")
     */
    public function AjoutEtude(Request $request)
    {
        $etude = new Etude();

        $form= $this->createForm(EtudeType::class, $etude);
        $form->handleRequest($request);
        //$repository_etude=$this->getDoctrine()->getRepository(Etude::class);
       
       // $etude= $repository_etude->find($idEtude);
        if($form->isSubmitted() && $form->isValid() )
        { 
            // $lastidetude = $repository_etude->findOneBy([], ['idetude' => 'desc'])->getIdetude();
            // $lastidetude = $lastidetude+1;
            // $etude->setIdetude($lastidetude); 
            $em=$this->getDoctrine()->getManager();
            $em->persist($etude);
            $em->flush(); 

            return $this->redirectToRoute("etudes");
        }  

        
        
        return $this->render('etude/ajout_etude.html.twig', [
            'form' => $form->createView(),

        ]);
    }

     /**
     * @Route("/etude/etude_has_plages/ajout_plage_has_etude/{idEtude}", name="ajout_plage_has_etude")
     */
    public function AjoutPlageHasEtude($idEtude ,Request $request)
    {
        $PHE = new PlageHasEtude();
        $plage = new Plage();
        $zone = new Zone();

        $formPHE= $this->createForm(PlageHasEtudeType::class, $PHE);
        $formPHE->handleRequest($request);

        $formPlage= $this->createForm(PlageFormForPHEType::class, $plage);
        $formPlage->handleRequest($request);

        $formZone= $this->createForm(ZoneType::class, $zone);
        $formZone->handleRequest($request);

        $repository_plage=$this->getDoctrine()->getRepository(Plage::class);
       

        if($formZone->isSubmitted() )
        { 

            
            $nomPlage = $formPlage->get('nomplage')->getData();

            $plageData= $repository_plage->findOneby(['nomplage' => $nomPlage]);
            $idEspeceData = $plageData->getIdplage();
            $PHE->setIdplage($idEspeceData);
            $PHE->setIdetude($idEtude);

            $em=$this->getDoctrine()->getManager();
            $em->persist($PHE);
            $em->flush(); 

            $em=$this->getDoctrine()->getManager();
            $em->persist($zone);
            $em->flush(); 

            // $repository_etude=$this->getDoctrine()->getRepository(Etude::class);
            // $etude= $repository_etude->findAll($idEtude);

            // return $this->render(
            //     'etude/etude_has_plage.html.twig',
            //     ['id'  => $idEtude]
            //   );
            return $this->redirectToRoute("etudes");
        }  

        
        
        return $this->render('etude/ajout_plage_has_etude.html.twig', [
            'formPHE' => $formPHE->createView(),
            'formPlage' => $formPlage->createView(),
            'formZone' => $formZone->createView(),



        ]);
    }
}
