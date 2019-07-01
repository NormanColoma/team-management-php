<?php


namespace App\Infrastructure\Persistance\RedisRepository;


use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisClient
{
    private $client;

    public function __construct()
    {
        $this->client = RedisAdapter::createConnection('redis://localhost:6379');
    }

    public function client() {
        return $this->client;
    }
}