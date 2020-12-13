<?php

namespace ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity="ProjetBundle\Entity\Medicament",mappedBy="categorie", cascade = {"persist"})
     */
    private $medicaments;

    /**
     * @ORM\ManyToMany(targetEntity="ProjetBundle\Entity\Pharmacie",cascade={"persist", "remove"})
     */
    private $pharmacie;


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
     * @return Categorie
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
     * Constructor
     */
    public function __construct()
    {
        $this->medicaments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add medicament
     *
     * @param \ProjetBundle\Entity\Medicament $medicament
     *
     * @return Categorie
     */
    public function addMedicament(\ProjetBundle\Entity\Medicament $medicament)
    {
        $this->medicaments[] = $medicament;
        $medicament->setCategorie($this);
        return $this;
    } 
 
    /**
     * Remove medicament
     *
     * @param \ProjetBundle\Entity\Medicament $medicament
     */
    public function removeMedicament(\ProjetBundle\Entity\Medicament $medicament)
    {
        $this->medicaments->removeElement($medicament);
    }

    /**
     * Get medicaments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicaments()
    {
        return $this->medicaments;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
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
     * Add pharmacie
     *
     * @param \ProjetBundle\Entity\Pharmacie $pharmacie
     *
     * @return Categorie
     */
    public function addPharmacie(\ProjetBundle\Entity\Pharmacie $pharmacie)
    {
        $this->pharmacie[] = $pharmacie;

        return $this;
    }
 
    /**
     * Remove pharmacie
     *
     * @param \ProjetBundle\Entity\Pharmacie $pharmacie
     */
    public function removePharmacie(\ProjetBundle\Entity\Pharmacie $pharmacie)
    {
        $this->pharmacie->removeElement($pharmacie);
    }

    /**
     * Get pharmacie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPharmacie()
    {
        return $this->pharmacie;
    }
}
