<?php


namespace App\Infrastructure\Rest\Controller;



use App\Application\AddPlayerToTeamService;
use App\Application\FindTeamsService;
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
        $addPlayerToTeamService->execute('F.C. Barcelona', 'Messi');

        return new Response(null,201);
    }

    /**
     * @Route("/teams", name="find_teams", methods={"GET"})
     * @param FindTeamsService $findTeamsService
     * @return JsonResponse
     */
    public function findAllTeams(FindTeamsService $findTeamsService): JsonResponse {
      /*  $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);*/


        return new JsonResponse($findTeamsService->execute(),200);
    }

}