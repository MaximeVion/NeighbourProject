<?php

namespace NeighbourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tool
 *
 * @ORM\Table(name="tool")
 * @ORM\Entity(repositoryClass="NeighbourBundle\Repository\ToolRepository")
 */
class Tool
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
     * @var bool
     *
     * @ORM\Column(name="dispo", type="boolean")
     */
    private $dispo;


    /**
     * @ORM\ManyToOne(targetEntity="NeighbourBundle\Entity\User", inversedBy="tools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="NeighbourBundle\Entity\Toollist", cascade={"persist"})
     *
     */
    private $toollist;

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
     * Set dispo
     *
     * @param boolean $dispo
     *
     * @return Tool
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return bool
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set user
     *
     * @param \NeighbourBundle\Entity\User $user
     *
     * @return Tool
     */
    public function setUser(\NeighbourBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \NeighbourBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set toollist
     *
     * @param \NeighbourBundle\Entity\Toollist $toollist
     *
     * @return Tool
     */
    public function setToollist(\NeighbourBundle\Entity\Toollist $toollist = null)
    {
        $this->toollist = $toollist;

        return $this;
    }

    /**
     * Get toollist
     *
     * @return \NeighbourBundle\Entity\toollist
     */
    public function getToollist()
    {
        return $this->toollist;
    }
}
