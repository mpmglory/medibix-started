<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Resultat
 *
 * @ORM\Table(name="resultat")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\ResultatRepository")
 */
class Resultat
{    
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\LaboBundle\Entity\Ber", mappedBy="resultat")
     */
    private $bers;
    
    /**
     * @ORM\ManyToOne(targetEntity="PMM\LaboBundle\Entity\Examen", inversedBy="resultat")
     */
    private $examen;
    
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
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    
    public function __construct(){
        
        $this->date = new \Datetime();
        $this->bers = new ArrayCollection();
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
     * @return Resultat
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
     * Set name
     *
     * @param string $name
     *
     * @return Resultat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    

    /**
     * Add ber
     *
     * @param \PMM\LaboBundle\Entity\Ber $ber
     *
     * @return Resultat
     */
    public function addBer(\PMM\LaboBundle\Entity\Ber $ber)
    {
        $this->bers[] = $ber;

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
     * Set examen
     *
     * @param \PMM\LaboBundle\Entity\Examen $examen
     *
     * @return Resultat
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
}
