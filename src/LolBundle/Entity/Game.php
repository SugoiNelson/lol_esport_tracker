<?php

namespace LolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="LolBundle\Repository\GameRepository")
 */
class Game
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="vs1")
     * @ORM\JoinColumn(name="teamA", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $teamA;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="vs2")
     * @ORM\JoinColumn(name="teamB", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $teamB;


    public function __construct() {
      $this->equipes = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="teamA_Score", type="string", length=255)
     */
    public $teamA_Score;

    /**
     * @var string
     *
     * @ORM\Column(name="teamB_Score", type="string", length=255)
     */
    public $teamB_Score;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Game
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
   * Set teamA
   *
   * @param integer $teamA
   *
   * @return Vs
   */
  public function setTeamA($teamA)
  {
      $this->teamA = $teamA;

      return $this;
  }

  /**
   * Get teamA
   */
  public function getTeamA()
  {
      return $this->teamA;
  }

  /**
   * Set teamB
   *
   * @param integer $teamB
   *
   * @return Vs
   */
  public function setTeamB($teamB)
  {
      $this->teamB = $teamB;

      return $this;
  }

  /**
   * Get teamB
   */
  public function getTeamB()
  {
      return $this->teamB;
  }

    /**
     * Set teamA_Score
     *
     * @param integer $teamA_Score
     *
     * @return Game
     */
    public function setTeamA_Score($teamA_Score)
    {
        $this->teamA_Score = $teamA_Score;

        return $this;
    }

    /**
     * Get teamA_Score
     *
     * @return string
     */
    public function getTeamA_Score()
    {
        return $this->teamA_Score;
    }

    /**
     * Set teamB_Score
     *
     * @param integer $teamB_Score
     *
     * @return Game
     */
    public function setTeamB_Score($teamB_Score)
    {
        $this->teamB_Score = $teamB_Score;

        return $this;
    }

    /**
     * Get teamB_Score
     *
     * @return string
     */
    public function getTeamB_Score()
    {
        return $this->teamB_Score;
    }
}
