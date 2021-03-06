<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\CommandeRepository")
 */
class Commande
{
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
     * @ORM\Column(name="code_c", type="string", length=255, unique=true)
     *
     */
    private $codeC;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_c", type="date")
     */
    private $dateC;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", length=255)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseC", type="string", length=255)
     */
    private $adresseC;

    /**
     * @var validation
     * @ORM\Column(name="validation", type="boolean", options={"default":true})
     */
    protected $validation;

    /** 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")    
     * @ORM\JoinColumn(nullable=false) 
     */  
    private $user; 

    /** 
     *@ORM\ManyToMany(targetEntity="ProjetBundle\Entity\Medicament", cascade={"persist"}) 
     */ 
    private $medicament; 


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
     * Set codeC
     *
     * @param string $codeC
     *
     * @return Commande
     */
    public function setCodeC($codeC)
    {
        $this->codeC = $codeC;

        return $this;
    }

    /**
     * Get codeC
     *
     * @return string
     */
    public function getCodeC()
    {
        return $this->codeC;
    }

    /**
     * Set dateC
     *
     * @param \DateTime $dateC
     *
     * @return Commande
     */
    public function setDateC($dateC)
    {
        $this->dateC = $dateC;

        return $this;
    }

    /**
     * Get dateC
     *
     * @return \DateTime
     */
    public function getDateC()
    {
        return $this->dateC;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Commande
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set adresseC
     *
     * @param string $adresseC
     *
     * @return Commande
     */
    public function setAdresseC($adresseC)
    {
        $this->adresseC = $adresseC;

        return $this;
    }

    /**
     * Get adresseC
     *
     * @return string
     */
    public function getAdresseC()
    {
        return $this->adresseC;
    }

    /**
     * Set validation
     *
     * @param boolean $validation
     *
     * @return Commande
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return boolean
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Commande
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __construct()
    {
     $this->dateC = new \DateTime('now');
    }

   

    /**
     * Add medicament
     *
     * @param \ProjetBundle\Entity\Medicament $medicament
     *
     * @return Commande
     */
    public function addMedicament(\ProjetBundle\Entity\Medicament $medicament)
    {
        $this->medicament[] = $medicament;

        return $this;
    }

    /**
     * Remove medicament
     *
     * @param \ProjetBundle\Entity\Medicament $medicament
     */
    public function removeMedicament(\ProjetBundle\Entity\Medicament $medicament)
    {
        $this->medicament->removeElement($medicament);
    }

    /**
     * Get medicament
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicament()
    {
        return $this->medicament;
    }
}
