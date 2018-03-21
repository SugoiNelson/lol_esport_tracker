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
     * @var string
     *
     * @ORM\Column(name="team_one", type="string", length=255)
     */
    private $teamOne;
    /**
     * @ORM\OneToMany(targetEntity="Team", mappedBy="game")
     */
    private $team;

    public function __construct() {
      $this->team = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="team_two", type="string", length=255)
     */
    private $teamTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="team_one_score", type="string", length=255)
     */
    private $teamOneScore;

    /**
     * @var string
     *
     * @ORM\Column(name="team_two_score", type="string", length=255)
     */
    private $teamTwoScore;


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
     * Set teamOne
     *
     * @param string $teamOne
     *
     * @return Game
     */
    public function setTeamOne($teamOne)
    {
        $this->teamOne = $teamOne;

        return $this;
    }

    /**
     * Get teamOne
     *
     * @return string
     */
    public function getTeamOne()
    {
        return $this->teamOne;
    }

    /**
     * Set teamTwo
     *
     * @param string $teamTwo
     *
     * @return Game
     */
    public function setTeamTwo($teamTwo)
    {
        $this->teamTwo = $teamTwo;

        return $this;
    }

    /**
     * Get teamTwo
     *
     * @return string
     */
    public function getTeamTwo()
    {
        return $this->teamTwo;
    }

    /**
     * Set teamOneScore
     *
     * @param string $teamOneScore
     *
     * @return Game
     */
    public function setTeamOneScore($teamOneScore)
    {
        $this->teamOneScore = $teamOneScore;

        return $this;
    }

    /**
     * Get teamOneScore
     *
     * @return string
     */
    public function getTeamOneScore()
    {
        return $this->teamOneScore;
    }

    /**
     * Set teamTwoScore
     *
     * @param string $teamTwoScore
     *
     * @return Game
     */
    public function setTeamTwoScore($teamTwoScore)
    {
        $this->teamTwoScore = $teamTwoScore;

        return $this;
    }

    /**
     * Get teamTwoScore
     *
     * @return string
     */
    public function getTeamTwoScore()
    {
        return $this->teamTwoScore;
    }
}
