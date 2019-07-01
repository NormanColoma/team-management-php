<?php


namespace App\Application\Service;


use App\Domain\Team\Player;
use App\Domain\Team\TeamRepository;
use Exception;

class AddPlayerToTeamService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(string $id, string $playerName): void {
        $team = $this->teamRepository->findById($id);

        if (is_null($team)) {
            throw new Exception("Team does not exist");
        }
        $player = new Player($playerName);
        $team->addPlayer($player);

        $this->teamRepository->save($team);
    }
}