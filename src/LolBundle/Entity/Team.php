<?php

namespace LolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="LolBundle\Repository\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="teamA")
     */
    private $vs1;

    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="teamB")
     */
    private $vs2;

    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     */
    private $player;

    public function __construct() {
      $this->vs1 = new ArrayCollection();
      $this->vs2 = new ArrayCollection();
      $this->player = new ArrayCollection();
    }

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
     * @return Team
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

    public function __toString() {
        return $this->name;
    }

    public function getPlayer(){
      return $this->player;
    }

    /**
     * Get vs1
     *
     * @return Vs
     */
    public function getVs1()
    {
        return $this->vs1;
    }

    /**
     * Get vs2
     *
     * @return Vs
     */
    public function getVs2()
    {
        return $this->vs2;
    }

}
