<?php


namespace App\Domain\Team;


use App\Domain\Team\Exception\PlayerWithNoValidNameException;

class Player
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @param mixed $name
     * @throws PlayerWithNoValidNameException
     */
    public function setName($name): void
    {
        if(empty($name) || is_null($name)) {
            throw new PlayerWithNoValidNameException("Name of the player is not a valid name");
        }
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