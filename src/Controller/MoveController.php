<?php

namespace App\Controller;

use App\Exception\ExceptionHandler;
use App\Repository\Move;
use App\ValueObject\Vector;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/move')]
class MoveController
{

    #[Route(path: '', methods: ['GET'])]
    public function move(Request $request): Response
    {
        $moveParameters = new Move(new Vector(3,4));
        $moveParameters->setPosition(new Vector(5,2,));

        try {
            $moveService = new \App\Service\Move($moveParameters);
            $moveService->execute();
            return new JsonResponse($moveParameters->getPosition()->toJson());
        } catch (\Throwable $exception){
            (new ExceptionHandler())->handle($moveService, $exception);
        }

        return new JsonResponse();
    }

}