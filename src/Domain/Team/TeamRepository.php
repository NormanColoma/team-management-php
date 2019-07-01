<?php


namespace App\Domain\Team;


interface TeamRepository
{
    public function save(Team $team): void;
    public function findAll(): array;
    public function findById(int $id): Team;
}