<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Medicament
 *
 * @ORM\Table(name="medicament")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\MedicamentRepository")
 */
class Medicament
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload an image.")
     * @Assert\Image()
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fab", type="date")
     */
    private $dateFab;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_exp", type="date")
     */
    private $dateExp;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock; 

    /**
     * @var array
     * @ORM\ManyToOne(targetEntity="ProjetBundle\Entity\Categorie",inversedBy="medicaments", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id", onDelete="cascade")
     */
    private $categorie;
    
    /** 
     *@ORM\ManyToMany(targetEntity="ProjetBundle\Entity\Commande", cascade={"persist"}) 
     */ 
    private $commandes; 


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Medicament
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Medicament
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Medicament
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Medicament
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set dateFab
     *
     * @param \DateTime $dateFab
     *
     * @return Medicament
     */
    public function setDateFab($dateFab)
    {
        $this->dateFab = $dateFab;

        return $this;
    }

    /**
     * Get dateFab
     *
     * @return \DateTime
     */
    public function getDateFab()
    {
        return $this->dateFab;
    }

    /**
     * Set dateExp
     *
     * @param \DateTime $dateExp
     *
     * @return Medicament
     */
    public function setDateExp($dateExp)
    {
        $this->dateExp = $dateExp;

        return $this;
    }

    /**
     * Get dateExp
     *
     * @return \DateTime
     */
    public function getDateExp()
    {
        return $this->dateExp;
    }

    /**
     * Set categorie
     *
     * @param \ProjetBundle\Entity\Categorie $categorie
     *
     * @return Medicament
     */
    public function setCategorie(\ProjetBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ProjetBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Medicament
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }
    /** 
     * Constructor
     */
    public function __construct()
    {
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commande
     *
     * @param \ProjetBundle\Entity\Commande $commande
     *
     * @return Medicament
     */
    public function addCommande(\ProjetBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \ProjetBundle\Entity\Commande $commande
     */
    public function removeCommande(\ProjetBundle\Entity\Commande $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
