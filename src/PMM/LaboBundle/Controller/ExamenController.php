<?php

namespace PMM\LaboBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\LaboBundle\Form\ExamenType;
use PMM\LaboBundle\Entity\Examen;

class ExamenController extends Controller{
    
    public function indexAction(){

        $listExam = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Examen')
                    ->findAll();


        return $this->render('PMMLaboBundle:Examen:index.html.twig', array(
            'listExam' => $listExam
            ));
    }

   public function viewAction($id){

    	$exam = $this->getDoctrine()->getManager()
    				->getRepository('PMMLaboBundle:Examen')
    				->find($id);

        return $this->render('PMMLaboBundle:Examen:view.html.twig', array(
        	'exam' => $exam
        	));
    }


    public function addAction(Request $request){

    	$exam = new Examen();

    	$form = $this->createForm(ExamenType::class, $exam);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em = $this->getDoctrine()->getManager();
			$em->persist($exam);
			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Examen bien enregistre.');
		
			return $this->redirectToRoute('pmm_examen_add');
		}

        return $this->render('PMMLaboBundle:Examen:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }


    public function editAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
        $exam  = $em->getRepository('PMMLaboBundle:Examen')->find($id);
        
        if(null === $exam){
            throw new NotFoundException("L'examen d'id " .$id. " n'existe pas.");
        }

    	$form = $this->get('form.factory')->create(ExamenType::class, $exam);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

			$em->flush();

			$request->getSession()->getFlashBag()
					->add('notice', 'Modification reussie.');
		
			return $this->render('PMMLaboBundle:Examen:view.html.twig', array(
        	   'exam' => $exam
        	));
		}

        return $this->render('PMMLaboBundle:Examen:edit.html.twig', array(
        	'form' => $form->createView()
        	));
    }

    public function deleteAction($id){

        $em = $this->getDoctrine()->getManager();
        $exam  = $em->getRepository('PMMLaboBundle:Examen')->find($id);

        $em->remove($exam);
        $em->flush();

        return $this->redirectToRoute('pmm_examen_homepage');
    }
    
    public function viewAllAction(){

        $listExam = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Examen')
                    ->findAll();


        return $this->render('PMMLaboBundle:Examen:view-all.html.twig', array(
            'listExam' => $listExam
            ));
    }

}
