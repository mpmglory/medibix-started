<?php
namespace PMM\LaboBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PMM\LaboBundle\Form\BulletinType;
use PMM\LaboBundle\Form\CustumBulletinType;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\Ber;
use PMM\LaboBundle\Form\BerType;


class BulletinController extends Controller{
    
    public function indexAction(){
        $listBul = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Bulletin')
                    ->findAll();
        return $this->render('PMMLaboBundle:Bulletin:index.html.twig', array(
            'listBul' => $listBul
            ));
    }
    
   public function viewAction($id){
        $bul = $this->getDoctrine()->getManager()
    				->getRepository('PMMLaboBundle:Bulletin')
    				->find($id);
        return $this->render('PMMLaboBundle:Bulletin:view.html.twig', array(
        	'bul' => $bul,
        	));
    }
    
    public function addAction(Request $request){
    	$bul = new Bulletin();
    	$form = $this->createForm(BulletinType::class, $bul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
			$em = $this->getDoctrine()->getManager();
			$em->persist($bul);
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Bulletin bien enregistré.');
		
			return $this->render('PMMLaboBundle:Bulletin:view.html.twig', array(
        	'bul' => $bul
        	));
		}
        return $this->render('PMMLaboBundle:Bulletin:add.html.twig', array(
        	'form' => $form->createView()
        	));
    }
    
    public function custumAddAction($id, Request $request){
    	$bul = new Bulletin();
        
        $patient = $this->getDoctrine()->getManager()
    				->getRepository('PMMCoreBundle:Patient')
    				->find($id);
        
        $bul->setPatient($patient);
    	$form = $this->createForm(CustumBulletinType::class, $bul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($bul);
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Bulletin enregistré avec succès.');
		
			return $this->redirectToRoute('pmm_bulletin_add');
		}
        return $this->render('PMMLaboBundle:Bulletin:custum-add.html.twig', array(
        	'form' => $form->createView(),
            'bul' => $bul,
        	));
    }
    
    
    public function editAction($id, Request $request){
        
    	$em = $this->getDoctrine()->getManager();
        $bul  = $em->getRepository('PMMLaboBundle:Bulletin')->find($id);
        
        if(null === $bul){
            throw new NotFoundException("Le bulletin d'examen numéro " .$id. " n'existe pas.");
        }
    	$form = $this->get('form.factory')->create(BulletinType::class, $bul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Modification reussie.');
		
			return $this->redirectToRoute('pmm_bulletin_view-all');
		}
        return $this->render('PMMLaboBundle:Bulletin:edit.html.twig', array(
        	'form' => $form->createView()
        	));
    }
    
    public function deleteAction($id){
        
        $em = $this->getDoctrine()->getManager();
        $bul  = $em->getRepository('PMMLaboBundle:Bulletin')->find($id);
        $em->remove($bul);
        $em->flush();
        return $this->redirectToRoute('pmm_bulletin_homepage');
    }
    
    public function viewAllAction(){
        
        $listBul = $this->getDoctrine()->getManager()
                    ->getRepository('PMMLaboBundle:Bulletin')
                    ->findAll();
        return $this->render('PMMLaboBundle:Bulletin:view-all.html.twig', array(
            'listBul' => $listBul
            ));
    }
    
}



