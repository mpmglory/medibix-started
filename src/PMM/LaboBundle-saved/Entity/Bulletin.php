<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use PMM\LaboBundle\Entity\Ber;

/**
 * Bulletin
 *
 * @ORM\Table(name="bulletin")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BulletinRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Bulletin
{
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\LaboBundle\Entity\Ber", cascade={"persist"}, mappedBy="bulletin")
     */
    private $bers;
    
    /**
     * @ORM\ManyToMany(targetEntity="PMM\LaboBundle\Entity\Examen")
     */
    private $examens;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\CoreBundle\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;
    
    
    public function __construct(){
        
        $this->date = new \Datetime();
        $this->amount = 0;
        $this->examens = new ArrayCollection();
        $this->bers = new ArrayCollection();
    }


    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function calculAmount(){

        $amt = 0;
        
        foreach($this->getExamens() as $exam){
            
            $amt += $exam->getPrice(); 
        }
        
        $this->setAmount($amt);
    }
    
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bulletin
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Bulletin
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Add ber
     *
     * @param \PMM\LaboBundle\Entity\Ber $ber
     *
     * @return Bulletin
     */
    public function addBer(\PMM\LaboBundle\Entity\Ber $ber)
    {
        $this->bers[] = $ber;
        
        $ber->setBulletin($this);

        return $this;
    }

    /**
     * Remove ber
     *
     * @param \PMM\LaboBundle\Entity\Ber $ber
     */
    public function removeBer(\PMM\LaboBundle\Entity\Ber $ber)
    {
        $this->bers->removeElement($ber);
    }

    /**
     * Get bers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBers()
    {
        return $this->bers;
    }

    /**
     * Add examen
     *
     * @param \PMM\LaboBundle\Entity\Examen $examen
     *
     * @return Bulletin
     */
    public function addExamen(\PMM\LaboBundle\Entity\Examen $examen)
    {
        $this->examens[] = $examen;
        
        foreach($examen->getResultats() as $resul){
            
            $ber = new Ber();
            $ber->setBulletin($this);
            $ber->setExamen($examen);
            $ber->setResultat($resul);
            $this->bers[] = $ber;
        }
        

        return $this;
    }

    /**
     * Remove examen
     *
     * @param \PMM\LaboBundle\Entity\Examen $examen
     */
    public function removeExamen(\PMM\LaboBundle\Entity\Examen $examen)
    {
        $this->examens->removeElement($examen);
    }

    /**
     * Get examens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExamens()
    {
        return $this->examens;
    }

    /**
     * Set patient
     *
     * @param \PMM\CoreBundle\Entity\Patient $patient
     *
     * @return Bulletin
     */
    public function setPatient(\PMM\CoreBundle\Entity\Patient $patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \PMM\CoreBundle\Entity\Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }
}
