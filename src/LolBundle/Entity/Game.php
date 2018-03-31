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
     *
     * @ORM\ManyToMany(targetEntity="Team")
     * @ORM\JoinTable(
     *  name="game_team",
     *  joinColumns={@ORM\JoinColumn(name="teamA", referencedColumnName="id", onDelete="persist")}
     * )
     */
    public $teamA;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Team")
     * @ORM\JoinTable(
     *  name="GameTeam",
     *  joinColumns={@ORM\JoinColumn(name="teamB", referencedColumnName="id", onDelete="persist")}
     * )
     */
    public $teamB;

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
     * Set teamA_id
     *
     * @param string $teamA_id
     *
     * @return Game
     */
    public function setTeamA_id($teamA_id)
    {
        $this->teamA_id = $teamA_id;

        return $this;
    }

    /**
     * Get teamA_id
     *
     * @return string
     */
    public function getTeamA_id()
    {
        return $this->teamA_id;
    }

    /**
     * Set teamB_id
     *
     * @param string $teamB_id
     *
     * @return Game
     */
    public function setTeamB_id($teamB_id)
    {
        $this->teamB_id = $teamB_id;

        return $this;
    }

    /**
     * Get teamB_id
     *
     * @return string
     */
    public function getTeamB_id()
    {
        return $this->teamB_id;
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
