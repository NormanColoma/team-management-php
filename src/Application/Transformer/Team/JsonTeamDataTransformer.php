<?php


namespace App\Application\Transformer\Team;

use App\Domain\Team\Team;

class JsonTeamDataTransformer implements TeamDataTransformer
{
    private $data = array();

    public function write($team)
    {
        if (is_array($team)) {
            foreach ($team as $t) {
                array_push($this->data, $this->teamAsJson($t));
            }
        } else {
            $this->data = $this->teamAsJson($team);
        }
    }

    public function read(): array
    {
        return $this->data;
    }

    private function teamAsJson(Team $team) {
        return array(
            'name' => $team->getName(),
            'players' => $team->getPlayers()
        );
    }
}