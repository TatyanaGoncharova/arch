<?php

namespace UnitTests\Service;

use App\DTO\SquareRootDTO;
use PHPUnit\Framework\TestCase;

class SquareRootServiceTest extends TestCase
{
    public function squareDataProvider(): array
    {

        return [
            [
                new SquareRootDTO(1, null, 1),
                []
            ],
            [
                new SquareRootDTO(1, null, -1),
                [floatval(1), floatval(-1)]
            ],
            [
                new SquareRootDTO(1, 2, 1),
                [floatval(-1)]
            ]
        ];
    }

    /**
     * @dataProvider squareDataProvider
     *
     * @param SquareRootDTO $squareRootDTO
     * @param array $expected
     *
     * @return void
     */
    public function testToSquareRootReturnsCorrectValues(SquareRootDTO $squareRootDTO, array $expected): void
    {
        $squareRootService = new \App\Service\SquareRootService();
        $actual = $squareRootService->getRoots($squareRootDTO);

        static::assertSame($expected, $actual, 'SquareRootService a - should have correct value');
    }

    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(0, 2, 1));
    }

    /**
     * @return void
     */
    public function testExceptionNanA(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(acos(8), 1, 2));
    }

    /**
     * @return void
     */
    public function testExceptionNanB(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(1, acos(8), 2));
    }

    /**
     * @return void
     */
    public function testExceptionNanC(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(1, 2, acos(8)));
    }

    /**
     * @return void
     */
    public function testExceptionInfA(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(log(0), 1, 2));
    }

    /**
     * @return void
     */
    public function testExceptionInfB(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(1, log(0), 2));
    }

    /**
     * @return void
     */
    public function testExceptionInfC(): void
    {
        $this->expectExceptionMessage('SquareRootService a - is not correct value');
        $squareRootService = new \App\Service\SquareRootService();
        $squareRootService->getRoots(new SquareRootDTO(1, 2, log(0)));
    }
}