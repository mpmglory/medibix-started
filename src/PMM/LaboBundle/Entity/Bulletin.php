<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bulletin
 *
 * @ORM\Table(name="bulletin")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BulletinRepository")
 */
class Bulletin
{
    
    /**
     * @ORM\ManyToMany(targetEntity="PMM\LaboBundle\Entity\Examen", cascade={"persist"})
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
        $this->amout = 0;
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
}
