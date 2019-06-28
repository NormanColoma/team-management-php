<?php


namespace App\Domain\team;


interface TeamRepository
{
    public function save(Team $team): void;
    public function findAll(): array;
    public function findByName(string $name): Team;
}