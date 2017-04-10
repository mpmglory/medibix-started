<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\Examen;
use PMM\LaboBundle\Entity\Resultat;

/**
 * Ber
 *
 * @ORM\Table(name="ber")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\BerRepository")
 */
class Ber
{
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Bulletin", inversedBy="bers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bulletin;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Examen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $examen;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Resultat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $resultat;
    
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
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    
    public function __construct(){
        
        $this->date = new \Datetime();
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
     * @return Ber
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
     * Set value
     *
     * @param string $value
     *
     * @return Ber
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set bulletin
     *
     * @param \PMM\LaboBundle\Entity\Bulletin $bulletin
     *
     * @return Ber
     */
    public function setBulletin(\PMM\LaboBundle\Entity\Bulletin $bulletin)
    {
        $this->bulletin = $bulletin;

        return $this;
    }

    /**
     * Get bulletin
     *
     * @return \PMM\LaboBundle\Entity\Bulletin
     */
    public function getBulletin()
    {
        return $this->bulletin;
    }

    /**
     * Set examen
     *
     * @param \PMM\LaboBundle\Entity\Examen $examen
     *
     * @return Ber
     */
    public function setExamen(\PMM\LaboBundle\Entity\Examen $examen)
    {
        $this->examen = $examen;

        return $this;
    }

    /**
     * Get examen
     *
     * @return \PMM\LaboBundle\Entity\Examen
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * Set resultat
     *
     * @param \PMM\LaboBundle\Entity\Resultat $resultat
     *
     * @return Ber
     */
    public function setResultat(\PMM\LaboBundle\Entity\Resultat $resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return \PMM\LaboBundle\Entity\Resultat
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}
