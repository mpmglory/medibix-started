<?php

namespace PMM\LaboBundle\BerCreation;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\Examen;
use PMM\LaboBundle\Entity\Resultat;
use PMM\LaboBundle\Entity\Ber;

class BerCreation{
    
    public function postPersist(LifecycleEventArgs $args){
        
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        
        if($entity instanceof Bulletin){
            
            foreach($entity->getExamens() as $exam){
                
                foreach($exam->getResultats() as $resul){
                
                    $ber = new Ber();

                    $ber->setBulletin($entity);
                    $ber->setExamen($exam);
                    $ber->setResultat($resul);
                    
                    $em->persist($ber);
                    $em->flush();
                }
            }
        }else{
            
            return;
        }
    }
    
}