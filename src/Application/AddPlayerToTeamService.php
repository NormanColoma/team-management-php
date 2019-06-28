<?php


namespace App\Application;


use App\Domain\team\Player;
use App\Domain\team\TeamRepository;

class AddPlayerToTeamService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(string $name, string $playerName): void {
        $team = $this->teamRepository->findByName($name);
        $player = new Player($playerName);
        $team->addPlayer($player);

        $this->teamRepository->save($team);
    }
}