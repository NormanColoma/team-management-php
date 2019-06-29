<?php


namespace App\Domain\team;


use Exception;
const MAX_PLAYERS = 20;

class Team
{
    private $name;
    private $players;

    public function __construct(string $name, array $players)
    {
        $this->setName($name);
        $this->setPlayers($players);
    }


    public function addPlayer(Player $player) {
        if ($this->totalPlayers() >= MAX_PLAYERS) {
            throw new Exception("Team cannot have more players");
        }

        array_push($this->players, $player);
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $players
     */
    public function setPlayers($players): void
    {
        $this->players = $players;
    }

    public function totalPlayers() {
        return sizeof($this->players);
    }

    public function __toString()
    {
        return "Team is" . $this->getName();
    }
}