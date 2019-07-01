<?php


namespace App\Application\Service;


use App\Domain\Team\Player;
use App\Domain\Team\TeamRepository;

class AddPlayerToTeamService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(string $id, string $playerName): void {
        $team = $this->teamRepository->findById($id);
        $player = new Player($playerName);
        $team->addPlayer($player);

        $this->teamRepository->save($team);
    }
}