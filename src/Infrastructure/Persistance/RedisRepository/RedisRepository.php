<?php


namespace App\Infrastructure\Persistance\RedisRepository;


use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;

class RedisRepository implements TeamRepository
{

    private $client;

    public function __construct(RedisClient $redisClient)
    {
        $this->client = $redisClient->client();
    }

    public function save(Team $team): void
    {
        $this->client->hSet('teams', (string) $team->getId(), serialize($team));
    }

    public function findAll(): array
    {
        $teams = $this->client->hGetAll('teams');
        return array_map(function ($data) {
            return unserialize($data);
        }, $teams);
    }

    public function findById(int $id): ?Team
    {
        $teamFound = $this->client->hGet('teams', 'asdfasdf');
        return is_null($teamFound) ? null : unserialize($teamFound);
    }

    public function generateNextId(): int
    {
        return random_int(1, 99999);
    }
}