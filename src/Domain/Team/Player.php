<?php


namespace App\Domain\Team;


class Player
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}