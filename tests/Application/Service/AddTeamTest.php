<?php


namespace App\Tests\Application\Service;


use App\Application\Service\AddTeam;
use App\Application\Service\AddTeamRequest;
use App\Domain\Team\Exception\TeamWithNoValidNameException;
use App\Domain\Team\Team;
use App\Domain\Team\TeamRepository;
use PHPUnit\Framework\TestCase;

class AddTeamTest extends TestCase
{
    public function testAddTeamService() {
        $teamRepository = $this->createMock(TeamRepository::class);

        $teamName = 'test';
        $expectedTeam = new Team($teamName, []);
        $expectedTeam->setId(5);

        $teamRepository->expects($this->once())
            ->method('save')
            ->with($expectedTeam);

        $teamRepository->method('generateNextId')
            ->willReturn(5);

        $addTeamService = new AddTeam($teamRepository);
        $addTeamService->execute(new AddTeamRequest($teamName));
    }

    public function testTeamCannotBeCreatedWhenNameIsEmpty() {
        $this->expectException(TeamWithNoValidNameException::class);
        $this->expectExceptionMessage('Name of the team is not a valid name');

        $teamRepository = $this->createMock(TeamRepository::class);

        $teamName = '';

        $addTeamService = new AddTeam($teamRepository);
        $addTeamService->execute(new AddTeamRequest($teamName));
    }
}