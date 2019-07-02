<?php


namespace App\Tests\Application\Service;


use App\Application\Service\AddPlayerToTeamService;
use App\Domain\Team\Exception\PlayerWithNoValidNameException;
use App\Domain\Team\Exception\TeamCannotHoldMorePlayersException;
use App\Domain\Team\Exception\TeamNotFoundException;
use App\Domain\Team\Player;
use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;
use PHPUnit\Framework\TestCase;

class AddPlayerToTeamServiceTest extends TestCase
{
    public function testThatCannotAddPlayerWhenTeamProvidedDoesNotExist() {
        $this->expectException(TeamNotFoundException::class);
        $this->expectExceptionMessage('Team does not exist');
        $team_repository = $this->createMock(TeamRepository::class);

        $team_id = 5;
        $team_repository->expects($this->once())
            ->method('findById')
            ->with($team_id)
            ->willReturn(null);

        $addPlayerToTeamService = new AddPlayerToTeamService($team_repository);
        $addPlayerToTeamService->execute($team_id, '');
    }

    public function testThatCannotAddPlayerWhenPlayerNameIsEmpty() {
        $this->expectException(PlayerWithNoValidNameException::class);
        $this->expectExceptionMessage('Name of the player is not a valid name');
        $team_repository = $this->createMock(TeamRepository::class);

        $team_id = 5;
        $team = new Team('test');
        $team_repository->expects($this->once())
            ->method('findById')
            ->with($team_id)
            ->willReturn($team);

        $addPlayerToTeamService = new AddPlayerToTeamService($team_repository);
        $addPlayerToTeamService->execute($team_id, '');
    }

    public function testThatCannotAddPlayerWhenTeamCannotHoldMorePlayers() {
        $this->expectException(TeamCannotHoldMorePlayersException::class);
        $this->expectExceptionMessage('Team cannot have more players');
        $team_repository = $this->createMock(TeamRepository::class);

        $team_id = 5;
        $team = new Team('test', array_fill(0, 20, new Player('test')));
        $team_repository->expects($this->once())
            ->method('findById')
            ->with($team_id)
            ->willReturn($team);

        $addPlayerToTeamService = new AddPlayerToTeamService($team_repository);
        $addPlayerToTeamService->execute($team_id, 'test');
    }

    public function testPlayerCanBeAddedToTeam() {
        $team_repository = $this->createMock(TeamRepository::class);

        $team_id = 5;
        $team = new Team('test');

        $team_repository->expects($this->once())
            ->method('findById')
            ->with($team_id)
            ->willReturn($team);

        $team_repository->expects($this->once())
            ->method('save')
            ->with($team);

        $addPlayerToTeamService = new AddPlayerToTeamService($team_repository);
        $addPlayerToTeamService->execute($team_id, 'test');
    }

}