<?php

namespace PMM\LaboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\LaboBundle\Form\BerType;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\Examen;
use PMM\LaboBundle\Entity\Resultat;
use PMM\LaboBundle\Entity\Ber;
use PMM\LaboBundle\Form\BerEditType;

class BerController extends Controller{
    
    
    public function addAction(Request $request){
        
    	$ber = new Ber();
        
    	$form = $this->createForm(TestBerType::class, $ber);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
			$em = $this->getDoctrine()->getManager();
			$em->persist($ber);
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Bulletin bien enregistré.');
		
			return $this->render('PMMLaboBundle:Ber:view.html.twig', array(
        	   'ber' => $ber
        	));
		}
        return $this->render('PMMLaboBundle:Ber:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }

   public function viewAction($id){

    	$ber = $this->getDoctrine()->getManager()
    				->getRepository('PMMLaboBundle:Ber')
    				->find($id);

        return $this->render('PMMLaboBundle:Ber:view.html.twig', array(
        	'ber' => $ber
        	));
    }
    
    public function editAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
        $ber  = $em->getRepository('PMMLaboBundle:Ber')->find($id);
        
       $form = $this->createForm(BerEditType::class, $ber);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
			$em = $this->getDoctrine()->getManager();
			$em->persist($ber);
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Bulletin bien enregistré.');
		
			return $this->render('PMMLaboBundle:Ber:view.html.twig', array(
        	   'ber' => $ber
        	));
		}
        return $this->render('PMMLaboBundle:Ber:add.html.twig', array(
        	'form' => $form->createView(),
            'ber' => $ber,
        	));
    }

}
