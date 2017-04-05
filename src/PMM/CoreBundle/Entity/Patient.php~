<?php

namespace PMM\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="PMM\CoreBundle\Repository\PatientRepository")
 */
class Patient
{
    public function __construct(){
        
        $this->date = new \Datetime();
    }
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="text")
     */
    private $telephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="text", nullable=true)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="text")
     */
    private $sex;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bornDate", type="datetime")
     */
    private $bornDate;

    /**
     * @var string
     *
     * @ORM\Column(name="bornPlacee", type="text", nullable=true)
     */
    private $bornPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="ethnicGroup", type="text", nullable=true)
     */
    private $ethnicGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="residence", type="text", nullable=true)
     */
    private $residence;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="text", nullable=true)
     */
    private $religion;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="text", nullable=true)
     */
    private $occupation;

    /**
     * @var string
     *
     * @ORM\Column(name="workPlace", type="text", nullable=true)
     */
    private $workPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="text", nullable=true)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="personToContact", type="text", nullable=true)
     */
    private $personToContact;

    /**
     * @var string
     *
     * @ORM\Column(name="bloodGroup", type="text", nullable=true)
     */
    private $bloodGroup;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
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
     * Set date
     *
     * @param string $date
     *
     * @return Patient
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Patient
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Patient
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set bornDate
     *
     * @param \DateTime $bornDate
     *
     * @return Patient
     */
    public function setBornDate($bornDate)
    {
        $this->bornDate = $bornDate;

        return $this;
    }

    /**
     * Get bornDate
     *
     * @return \DateTime
     */
    public function getBornDate()
    {
        return $this->bornDate;
    }

    /**
     * Set bornPlace
     *
     * @param string $bornPlace
     *
     * @return Patient
     */
    public function setBornPlace($bornPlace)
    {
        $this->bornPlace = $bornPlace;

        return $this;
    }

    /**
     * Get bornPlace
     *
     * @return string
     */
    public function getBornPlace()
    {
        return $this->bornPlace;
    }

    /**
     * Set ethnicGroup
     *
     * @param string $ethnicGroup
     *
     * @return Patient
     */
    public function setEthnicGroup($ethnicGroup)
    {
        $this->ethnicGroup = $ethnicGroup;

        return $this;
    }

    /**
     * Get ethnicGroup
     *
     * @return string
     */
    public function getEthnicGroup()
    {
        return $this->ethnicGroup;
    }

    /**
     * Set residence
     *
     * @param string $residence
     *
     * @return Patient
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get residence
     *
     * @return string
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * Set religion
     *
     * @param string $religion
     *
     * @return Patient
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return string
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     *
     * @return Patient
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set workPlace
     *
     * @param string $workPlace
     *
     * @return Patient
     */
    public function setWorkPlace($workPlace)
    {
        $this->workPlace = $workPlace;

        return $this;
    }

    /**
     * Get workPlace
     *
     * @return string
     */
    public function getWorkPlace()
    {
        return $this->workPlace;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Patient
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set personToContact
     *
     * @param string $personToContact
     *
     * @return Patient
     */
    public function setPersonToContact($personToContact)
    {
        $this->personToContact = $personToContact;

        return $this;
    }

    /**
     * Get personToContact
     *
     * @return string
     */
    public function getPersonToContact()
    {
        return $this->personToContact;
    }

    /**
     * Set bloodGroup
     *
     * @param string $bloodGroup
     *
     * @return Patient
     */
    public function setBloodGroup($bloodGroup)
    {
        $this->bloodGroup = $bloodGroup;

        return $this;
    }

    /**
     * Get bloodGroup
     *
     * @return string
     */
    public function getBloodGroup()
    {
        return $this->bloodGroup;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Patient
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Patient
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }
}
