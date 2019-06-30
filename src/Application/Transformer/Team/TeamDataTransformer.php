<?php


namespace App\Application\Transformer\Team;


use App\Domain\Team\Team;

interface TeamDataTransformer
{

    public function write($object);
    public function read() : array;

}