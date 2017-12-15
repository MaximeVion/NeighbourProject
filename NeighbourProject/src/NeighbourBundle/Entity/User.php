<?php

namespace NeighbourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="NeighbourBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="appartement", type="string", length=255)
     */
    private $appartement;


    /**
     * @ORM\OneToMany(targetEntity="NeighbourBundle\Entity\Tool", mappedBy="user")
     */
    private $tools;

    /**
     * @ORM\OneToMany(targetEntity="NeighbourBundle\Entity\Message", mappedBy="user")
     */
    private $messages;


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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
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
     * Set appartement
     *
     * @param string $appartement
     *
     * @return User
     */
    public function setAppartement($appartement)
    {
        $this->appartement = $appartement;

        return $this;
    }

    /**
     * Get appartement
     *
     * @return string
     */
    public function getAppartement()
    {
        return $this->appartement;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tools = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tool
     *
     * @param \neighbourBundle\Entity\Tool $tool
     *
     * @return User
     */
    public function addTool(\neighbourBundle\Entity\tool $tool)
    {
        $this->tools[] = $tool;

        return $this;
    }

    /**
     * Remove tool
     *
     * @param \neighbourBundle\Entity\tool $tool
     */
    public function removeTool(\neighbourBundle\Entity\Tool $tool)
    {
        $this->tools->removeElement($tool);
    }

    /**
     * Get tools
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTools()
    {
        return $this->tools;
    }
}
