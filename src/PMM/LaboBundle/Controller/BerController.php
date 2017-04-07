<?php

namespace PMM\LaboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\LaboBundle\Form\BerType;
use PMM\LaboBundle\Entity\Ber;

class BerController extends Controller{
    
    public function indexAction(){

        $listBer = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Ber')
                    ->findAll();


        return $this->render('PMMLaboBundle:Ber:index.html.twig', array(
            'listBer' => $listBer
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


    public function addAction(Request $request){

    	$ber = new Ber();

    	$form = $this->createForm(BerType::class, $ber);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em = $this->getDoctrine()->getManager();
			$em->persist($ber);
			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Ber bien enregistre.');
		
			return $this->redirectToRoute('pmm_ber_add');
		}

        return $this->render('PMMLaboBundle:Ber:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }


    public function editAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
        $ber  = $em->getRepository('PMMLaboBundle:Ber')->find($id);
        
        if(null === $ber){
            throw new NotFoundException("L'Ber d'id " .$id. " n'existe pas.");
        }

    	$form = $this->get('form.factory')->create(BerType::class, $ber);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Modification reussie.');
		
			return $this->redirectToRoute('pmm_ber_view-all');
		}

        return $this->render('PMMLaboBundle:Ber:edit.html.twig', array(
        	'form' => $form->createView()
        	));
    }

    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $ber  = $em->getRepository('PMMLaboBundle:Ber')->find($id);

        $em->remove($ber);
        $em->flush();

        return $this->redirectToRoute('pmm_ber_homepage');
    }
    
    public function viewAllAction(){

        $listber = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Ber')
                    ->findAll();


        return $this->render('PMMLaboBundle:Ber:view-all.html.twig', array(
            'listBer' => $listBer
            ));
    }

}
