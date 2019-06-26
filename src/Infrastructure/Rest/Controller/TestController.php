<?php


namespace App\Infrastructure\Rest\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends AbstractController
{
    /**
     * @Route("/test", name="blog_list")
     */
    public function test() {
        $response = new JsonResponse();
// ...
        $response->setData(['data' => 123]);
        return $response;
    }

}