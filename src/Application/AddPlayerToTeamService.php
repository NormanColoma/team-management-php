<?php


namespace App\Application;


use App\Domain\team\TeamRepository;

class AddPlayerToTeamService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(string $name) {
        return $this->teamRepository->findByName($name);
    }
}