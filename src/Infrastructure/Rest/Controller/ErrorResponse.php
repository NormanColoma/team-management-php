<?php


namespace App\Infrastructure\Rest\Controller;


use Symfony\Component\HttpFoundation\Response;

class ErrorResponse extends Response
{
    public function __construct($content = '', int $status = Response::HTTP_INTERNAL_SERVER_ERROR, array $headers = ['Content-type' => 'application/json'])
    {
        parent::__construct(json_encode(['error' => $content]), $status, $headers);
    }
}