<?php


namespace App\Infrastructure\Persistance\InMemoryRepository;


use App\Domain\team\Team;
use App\Domain\team\TeamRepository;

class InMemoryTeamRepository implements TeamRepository
{
    private $teams = [];

    public function save(Team $team): void
    {
        // TODO: Implement save() method.
    }

    public function findAll(): array
    {
        array_push($this->teams, new Team('F.C. Barcelona', []));
        return $this->teams;
    }

    public function findByName(string $name): Team
    {
        return new Team('F.C. Barcelona', []);
    }
}