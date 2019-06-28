<?php


namespace App\Application;


use App\Domain\team\TeamRepository;

class FindTeamsService
{
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function execute(): array {
        return $this->teamRepository->findAll();
    }

}