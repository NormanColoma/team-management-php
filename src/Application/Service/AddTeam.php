<?php


namespace App\Application\Service;


use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;
use Exception;

class AddTeam
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(Team $team) {
        $this->teamRepository->save($team);
    }

}