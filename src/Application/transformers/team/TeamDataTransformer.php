<?php


namespace App\Application\transformers\team;


use App\Domain\team\Team;

interface TeamDataTransformer
{

    public function write(Team $team);
    public function read() : array;

}