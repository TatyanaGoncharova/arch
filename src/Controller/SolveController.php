<?php

namespace App\Controller;

use App\DTO\SquareRootDTO;
use App\Service\SquareRootService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route(path: '/solve/squareRoot')]
class SolveController
{
    private SquareRootService $squareRootService;

    public function __construct()
    {
        $this->squareRootService = new SquareRootService();
    }

    #[Route(path: '', methods: ['GET'])]
    public function getSquareRoot(Request $request): Response
    {
        $squareRootDTO = new SquareRootDTO(
            $request->query->get('a'),
            $request->query->get('b'),
            $request->query->get('c')
        );

        $result = $this->squareRootService->getRoots($squareRootDTO);

        return new JsonResponse($result);
    }
}