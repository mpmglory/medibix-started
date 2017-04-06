<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExamenResultat
 *
 * @ORM\Table(name="examen_resultat")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\ExamenResultatRepository")
 */
class ExamenResultat
{
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Examen")
     * @ORM\JoinColumn(nullable=true)
     */
    private $examen;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Resultat")
     * @ORM\JoinColumn(nullable=true)
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
     * @return ExamenResultat
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
     * @return ExamenResultat
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
     * Set examen
     *
     * @param \PMM\LaboBundle\Entity\Examen $examen
     *
     * @return ExamenResultat
     */
    public function setExamen(\PMM\LaboBundle\Entity\Examen $examen = null)
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
     * @return ExamenResultat
     */
    public function setResultat(\PMM\LaboBundle\Entity\Resultat $resultat = null)
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
