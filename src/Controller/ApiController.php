<?php
// src/Controller/ApiController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ApiController extends AbstractController
{
    protected function success(mixed $data, int $status = JsonResponse::HTTP_OK): JsonResponse
    {
        return new JsonResponse([
            "success" => true,
            "data" => $data
        ], $status);
    }

    protected function error(string $message, int $status = JsonResponse::HTTP_BAD_REQUEST): JsonResponse
    {
        return new JsonResponse([
            "success" => false,
            "error" => $message
        ], $status);
    }
}
