<?php

namespace PMM\LaboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\LaboBundle\Form\ResultatType;
use PMM\LaboBundle\Entity\Resultat;

class ResultatController extends Controller{
    
    public function indexAction(){

        $listResul = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Resultat')
                    ->findAll();


        return $this->render('PMMLaboBundle:Resultat:index.html.twig', array(
            'listResul' => $listResul
            ));
    }

   public function viewAction($id){

    	$resul = $this->getDoctrine()->getManager()
    				->getRepository('PMMLaboBundle:Resultat')
    				->find($id);

        return $this->render('PMMLaboBundle:Resultat:view.html.twig', array(
        	'resul' => $resul
        	));
    }


    public function addAction(Request $request){

    	$resul = new Resultat();

    	$form = $this->createForm(ResultatType::class, $resul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em = $this->getDoctrine()->getManager();
			$em->persist($resul);
			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Resultat bien enregistre.');
		
			return $this->redirectToRoute('pmm_resultat_add');
		}

        return $this->render('PMMLaboBundle:Resultat:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }


    public function editAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
        $resul  = $em->getRepository('PMMLaboBundle:Resultat')->find($id);
        
        if(null === $resul){
            throw new NotFoundException("L'Resultat d'id " .$id. " n'existe pas.");
        }

    	$form = $this->get('form.factory')->create(ResultatType::class, $resul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Modification reussie.');
		
			return $this->redirectToRoute('pmm_resultat_view-all');
		}

        return $this->render('PMMLaboBundle:Resultat:edit.html.twig', array(
        	'form' => $form->createView()
        	));
    }

    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $resul  = $em->getRepository('PMMLaboBundle:Resultat')->find($id);

        $em->remove($resul);
        $em->flush();

        return $this->redirectToRoute('pmm_resultat_homepage');
    }
    
    public function viewAllAction(){

        $listResul = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Resultat')
                    ->findAll();


        return $this->render('PMMLaboBundle:Resultat:view-all.html.twig', array(
            'listResul' => $listResul
            ));
    }

}
