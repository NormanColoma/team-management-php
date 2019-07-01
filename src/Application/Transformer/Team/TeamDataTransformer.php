<?php


namespace App\Application\Transformer\Team;


interface TeamDataTransformer
{

    public function write($object);
    public function read() : array;

}