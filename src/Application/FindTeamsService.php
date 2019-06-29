<?php


namespace App\Application;


use App\Application\transformers\team\TeamDataTransformer;
use App\Domain\team\TeamRepository;

class FindTeamsService
{
    private $teamRepository;
    private $teamDataTransformer;

    public function __construct(TeamRepository $teamRepository, TeamDataTransformer $teamDataTransformer)
    {
        $this->teamRepository = $teamRepository;
        $this->teamDataTransformer = $teamDataTransformer;
    }

    public function execute(): array {
        $teams = $this->teamRepository->findAll();
        $teamsResponse = [];
        foreach ($teams as $team) {
            $this->teamDataTransformer->write($team);
            array_push($teamsResponse, $this->teamDataTransformer->read());
        }
        return $teamsResponse;
    }

}