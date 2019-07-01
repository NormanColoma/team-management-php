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

        $this->teamRepository->save(new Team($request->getName()));
    }

}