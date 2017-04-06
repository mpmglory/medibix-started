<?php

namespace PMM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\CoreBundle\Form\PatientType;
use PMM\CoreBundle\Entity\Patient;

class PatientController extends Controller{
    
    public function indexAction(){

        $listPatient = $this->getDoctrine()->getManager()
                    ->getRepository('PMMCoreBundle:Patient')
                    ->findAll();


        return $this->render('PMMCoreBundle:Patient:index.html.twig', array(
            'listPatient' => $listPatient
            ));
    }

   public function viewAction($id){

    	$patient = $this->getDoctrine()->getManager()
    				->getRepository('PMMCoreBundle:Patient')
    				->find($id);

        return $this->render('PMMCoreBundle:Patient:view.html.twig', array(
        	'patient' => $patient
        	));
    }


    public function addAction(Request $request){

    	$patient = new Patient();

    	$form = $this->createForm(PatientType::class, $patient);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em = $this->getDoctrine()->getManager();
			$em->persist($patient);
			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Patient bien enregistré.');
		
			 return $this->render('PMMCoreBundle:Patient:view.html.twig', array(
                 'patient' => $patient
        	));
		}

        return $this->render('PMMCoreBundle:Patient:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }


    public function editAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
        $patient  = $em->getRepository('PMMCoreBundle:Patient')->find($id);
        
        if(null === $patient){
            throw new NotFoundException("Le patient numéro " .$id. " n'existe pas.");
        }

    	$form = $this->get('form.factory')->create(PatientType::class, $patient);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Modification réussie.');
		
			return $this->render('PMMCoreBundle:Patient:view.html.twig', array(
        	       'patient' => $patient
        	       ));
		}

        return $this->render('PMMCoreBundle:Patient:edit.html.twig', array(
        	'form' => $form->createView()
        ));
    }

    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $patient  = $em->getRepository('PMMCoreBundle:Patient')->find($id);

        $em->remove($patient);
        $em->flush();

        return $this->redirectToRoute('pmm_patient_homepage');
    }
    
    public function viewAllAction(){

        $listPatient = $this->getDoctrine()->getManager()
                    ->getRepository('PMMCoreBundle:Patient')
                    ->findAll();


        return $this->render('PMMCoreBundle:Patient:view-all.html.twig', array(
            'listPatient' => $listPatient
            ));
    }

}
