<?php
        // src/AppBundle/Entity/User.php

        namespace AppBundle\Entity;

        use FOS\UserBundle\Model\User as BaseUser;
        use Doctrine\ORM\Mapping as ORM;
        use Symfony\Component\Validator\Constraints as Assert;
        /**
         * @ORM\Entity
         * @ORM\Table(name="fos_user")
         */
        class User extends BaseUser
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;

            /**
             * @ORM\Column(type="string" , length=8)
             * @Assert\Length(
             *      min = 8,
             *      max = 8,
             *      minMessage = "Your first name must be at least {{ limit }} characters long",
             *      maxMessage = "Your first name cannot be longer than {{ limit }} characters")
             */
            protected $mobile;

            /**
             * @ORM\Column(type="string" , length=255)
             */
            protected $adresse;

            /**
             * @ORM\Column(type="date")
             */
            protected $date_de_naissance;

            /**
             * @ORM\Column(type="string" , length=255)
             */
            protected $sexe;

            /**
             * @ORM\Column(type="string" , length=255)
             */
            protected $ville;

            /**
             * @var string
             *
             * @ORM\Column(name="Gouvernorat", type="string", length=255)
             */
            private $gouvernorat;

            
             /**    
             * @ORM\OneToOne (targetEntity="ProjetBundle\Entity\Pharmacie")
             * 
             * 
             */ 
            private $pharmacie; 

            /**
             * @var int
             *
             * @ORM\Column(name="CodePostal", type="integer")
             * @Assert\Length(
             *      min = 4,
             *      max = 4,
             *      minMessage = "Your first name must be at least {{ limit }} characters long",
             *      maxMessage = "Your first name cannot be longer than {{ limit }} characters")
             */
            private $CodePostal;



            public function __construct()
            {
                parent::__construct();
                // your own logic
            }
        
    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return User
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
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     *
     * @return User
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->date_de_naissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime
     */
    public function getDateDeNaissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * Set gouvernorat
     *
     * @param string $gouvernorat
     *
     * @return User
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    /**
     * Get gouvernorat
     *
     * @return string
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return User
     */
    public function setCodePostal($codePostal)
    {
        $this->CodePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->CodePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pharmacie
     *
     * @param \ProjetBundle\Entity\Pharmacie $pharmacie
     *
     * @return User
     */
    public function setPharmacie(\ProjetBundle\Entity\Pharmacie $pharmacie = null)
    {
        $this->pharmacie = $pharmacie;

        return $this;
    }

    /**
     * Get pharmacie
     *
     * @return \ProjetBundle\Entity\Pharmacie
     */
    public function getPharmacie()
    {
        return $this->pharmacie;
    }
}
