<?php

namespace PMM\LaboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Examen
 *
 * @ORM\Table(name="examen")
 * @ORM\Entity(repositoryClass="PMM\LaboBundle\Repository\ExamenRepository")
 */
class Examen
{    
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\LaboBundle\Entity\Ber", mappedBy="examen")
     */
    private $bers;
    
    /**
     * @ORM\OneToMany(targetEntity="PMM\LaboBundle\Entity\Ber", mappedBy="examen")
     */
    private $resultats;
    
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

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    
    public function __construct(){
        
        $this->date = new \Datetime();
        $this->bers = new ArrayCollection();
        $this->resultat = new ArrayCollection();
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
     * @return Examen
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
     * @return Examen
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
     * Set price
     *
     * @param float $price
     *
     * @return Examen
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * Add ber
     *
     * @param \PMM\LaboBundle\Entity\Ber $ber
     *
     * @return Examen
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
     * Add resultat
     *
     * @param \PMM\LaboBundle\Entity\Ber $resultat
     *
     * @return Examen
     */
    public function addResultat(\PMM\LaboBundle\Entity\Ber $resultat)
    {
        $this->resultats[] = $resultat;

        return $this;
    }

    /**
     * Remove resultat
     *
     * @param \PMM\LaboBundle\Entity\Ber $resultat
     */
    public function removeResultat(\PMM\LaboBundle\Entity\Ber $resultat)
    {
        $this->resultats->removeElement($resultat);
    }

    /**
     * Get resultats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResultats()
    {
        return $this->resultats;
    }
}
