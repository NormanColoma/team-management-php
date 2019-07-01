<?php


namespace App\Infrastructure\Rest\Controller;




use App\Application\Service\AddPlayerToTeamService;
use App\Application\Service\AddTeam;
use App\Application\Service\FindTeamsService;
use App\Domain\Team\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TeamController extends AbstractController
{
    /**
     * @Route("/assingPlayer", name="assign_player", methods={"POST"})
     * @param AddPlayerToTeamService $addPlayerToTeamService
     * @return Response
     */
    public function addPlayerToTeam(AddPlayerToTeamService $addPlayerToTeamService) : Response {
        try {
            $addPlayerToTeamService->execute(15036, 'Messi');

            return new Response(null,201);
        } catch (\Exception $ex) {
            return $this->errorResponse($ex);
        }

    }

    /**
     * @Route("/teams", name="find_teams", methods={"GET"})
     * @param FindTeamsService $findTeamsService
     * @return Response
     */
    public function findAllTeams(FindTeamsService $findTeamsService): Response {
        return new JsonResponse($findTeamsService->execute(),Response::HTTP_OK);
    }

    /**
     * @Route("/teams/new", name="add_team", methods={"POST"})
     * @param AddTeam $addTeam
     * @return Response
     */
    public function addTeam(AddTeam $addTeam) : Response {
        $team = new Team('F.C. Barcelona', []);
        $addTeam->execute($team);

        return new Response(null,Response::HTTP_CREATED);
    }

    private function errorResponse(\Exception $ex) : Response {
        return new ErrorResponse($ex->getMessage());
    }

}