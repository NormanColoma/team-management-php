<?php


namespace App\Tests\Application\Service;


use App\Application\Service\FindTeamsService;
use App\Application\Transformer\Team\JsonTeamDataTransformer;
use App\Domain\Team\Player;
use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;
use PHPUnit\Framework\TestCase;

class FindTeamsServiceTest extends TestCase
{

    public function testAllTeamsAreFound() {
        $team_repository = $this->createMock(TeamRepository::class);

        $teams = array_fill(0,2, new Team('Test', [new Player('Test')]));

        $team_repository->expects($this->once())
            ->method('findAll')
            ->willReturn($teams);

        $expectedTeams = array_map(function ($team){
            return array(
                'name' => $team->getName(),
                'players' => array_map(function ($player){ return array('name' => $player->getName()); }, $team->getPlayers())
            );
        }, $teams);

        $find_team_service = new FindTeamsService($team_repository, new JsonTeamDataTransformer());
        $this->assertEquals($expectedTeams, $find_team_service->execute());
    }

}