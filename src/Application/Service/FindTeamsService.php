<?php


namespace App\Application\Service;




use App\Application\Transformer\Team\TeamDataTransformer;
use App\Domain\Team\TeamRepository;

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
        $this->teamDataTransformer->write($teams);
        return $this->teamDataTransformer->read();
    }

}