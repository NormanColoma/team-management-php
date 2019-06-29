<?php


namespace App\Application\transformers\team;


use App\Domain\team\Team;

class JsonTeamDataTransformer implements TeamDataTransformer
{
    private $data;

    public function write(Team $team)
    {
        $this->data = array(
            'name' => $team->getName(),
            'players' => $team->getPlayers()
        );
    }

    public function read(): array
    {
        return $this->data;
    }
}