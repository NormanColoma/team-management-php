<?php


namespace App\Domain\Team;


use App\Domain\Team\Exception\TeamCannotHoldMorePlayersException;
use App\Domain\Team\Exception\TeamWithNoValidNameException;
const MAX_PLAYERS = 20;

class Team
{
    private $id;
    private $name;
    private $players;

    public function __construct(string $name, array $players = [])
    {
        $this->setName($name);
        $this->setPlayers($players);
    }


    public function addPlayer(Player $player) {
        if ($this->totalPlayers() >= MAX_PLAYERS) {
            throw new TeamCannotHoldMorePlayersException("Team cannot have more players");
        }

        array_push($this->players, $player);
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @throws TeamWithNoValidNameException
     */
    public function setName($name): void
    {
        if(empty($name) || is_null($name)) {
            throw new TeamWithNoValidNameException("Name of the team is not a valid name");
        }
        $this->name = $name;
    }

    /**
     * @param mixed $players
     */
    public function setPlayers($players): void
    {
        $this->players = $players;
    }

    private function totalPlayers() {
        return sizeof($this->players);
    }

    public function __toString()
    {
        return "Team is" . $this->getName();
    }
}