<?php

namespace UnitTests\Service;

use App\Contract\MovableInterface;
use App\Service\Move;
use App\ValueObject\Vector;
use JetBrains\PhpStorm\NoReturn;
use Mockery;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{

    public function moveDataProvider(): array
    {

        return [
            [
                new Vector(12, 5),
                new Vector(-7, 3),
                new Vector(5, 8),
            ]
        ];
    }

    /**
     * @dataProvider moveDataProvider
     *
     * @param Vector $position
     * @param Vector $velocity
     * @param Vector $expected
     * @return void
     */
    #[NoReturn] public function testToMoveReturnsCorrectValues(Vector $position, Vector $velocity, Vector $expected): void
    {

        $movable = Mockery::mock(MovableInterface::class);
        $movable->shouldReceive('getPosition')->once()->andReturn($position);
        $movable->shouldReceive('getVelocity')->andReturn($velocity);
        $movable->shouldReceive('setPosition')
            ->with(\Mockery::on(function ($argument) use ($movable) {
                $movable->shouldReceive('getPosition')->andReturn($argument);
            }));
        $movable->shouldReceive('setPosition');

        $move = new Move($movable);
        $move->execute();

        static::assertEquals($expected, $movable->getPosition(), 'move should have correct value');
    }

    /**
     * @return void
     */
    public function testExceptionPosition(): void
    {
        $this->expectException('Exception');
        $movable = Mockery::mock(MovableInterface::class);
        $movable->shouldReceive('getPosition')->andThrowExceptions([new \Exception]);
        $movable->shouldReceive('getVelocity')->andReturn(new Vector(-7, 3),);
        $movable->shouldReceive('setPosition');
        $move = new Move($movable);
        $move->execute();
    }

    public function testExceptionVelocity(): void
    {
        $this->expectException('Exception');
        $movable = Mockery::mock(MovableInterface::class);
        $movable->shouldReceive('getVelocity')->andThrowExceptions([new \Exception]);
        $movable->shouldReceive('getPosition')->andReturn(new Vector(-7, 3),);
        $movable->shouldReceive('setPosition');
        $move = new Move($movable);
        $move->execute();
    }

    public function testExceptionSetPosition(): void
    {
        $this->expectException('Exception');
        $movable = Mockery::mock(MovableInterface::class);
        $movable->shouldReceive('getVelocity')->andReturn(new Vector(-7, 3),);
        $movable->shouldReceive('getPosition')->andReturn(new Vector(-7, 3),);
        $movable->shouldReceive('setPosition')->andThrowExceptions([new \Exception]);
        $move = new Move($movable);
        $move->execute();
    }
}