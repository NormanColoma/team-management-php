<?php


namespace App\Application\Service;


use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;

class AddTeam
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(AddTeamRequest $request) {
        $team = new Team($request->getName());
        $team->setId($this->teamRepository->generateNextId());

        $this->teamRepository->save($team);
    }

}