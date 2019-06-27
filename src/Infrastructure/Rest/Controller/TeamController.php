<?php


namespace App\Infrastructure\Rest\Controller;



use App\Application\AddPlayerToTeamService;
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
    public function addPlayerToTeam(AddPlayerToTeamService $addPlayerToTeamService) {
        $team = $addPlayerToTeamService->execute('F.C. Barcelona');

        return new JsonResponse(['name' => $team->getName(), "players" => $team->getPlayers()], 200);
        //return new Response($team, 200);
    }

}