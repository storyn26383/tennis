<?php

namespace Tests;

use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    protected $game;

    public function setUp(): void
    {
        parent::setUp();

        $john = new Player;
        $jane = new Player;

        $this->game = new Game($john, $jane);
    }

    public function testLoveAll()
    {
        $this->earnPoints(0, 0)->andScoreShouldBe('Love All');
    }

    public function testFiftenLove()
    {
        $this->earnPoints(1, 0)->andScoreShouldBe('Fiften Love');
    }

    public function testThirtyLove()
    {
        $this->earnPoints(2, 0)->andScoreShouldBe('Thirty Love');
    }

    public function testFortyLove()
    {
        $this->earnPoints(3, 0)->andScoreShouldBe('Forty Love');
    }

    public function testLoveFiften()
    {
        $this->earnPoints(0, 1)->andScoreShouldBe('Love Fiften');
    }

    public function testLoveThirty()
    {
        $this->earnPoints(0, 2)->andScoreShouldBe('Love Thirty');
    }

    public function testLoveForty()
    {
        $this->earnPoints(0, 3)->andScoreShouldBe('Love Forty');
    }

    public function testFiftenAll()
    {
        $this->earnPoints(1, 1)->andScoreShouldBe('Fiften All');
    }

    public function testThirtyAll()
    {
        $this->earnPoints(2, 2)->andScoreShouldBe('Thirty All');
    }

    public function testDeuce()
    {
        $this->earnPoints(3, 3)->andScoreShouldBe('Deuce');
    }

    public function testDeuce2()
    {
        $this->earnPoints(4, 4)->andScoreShouldBe('Deuce');
    }

    public function testDeuce3()
    {
        $this->earnPoints(5, 5)->andScoreShouldBe('Deuce');
    }

    public function testJohnAdv()
    {
        $this->earnPoints(4, 3)->andScoreShouldBe('John Adv');
    }

    public function testJaneAdv()
    {
        $this->earnPoints(3, 4)->andScoreShouldBe('Jane Adv');
    }

    public function testJohnWin()
    {
        $this->earnPoints(5, 3)->andScoreShouldBe('John Win');
    }

    public function testJaneWin()
    {
        $this->earnPoints(3, 5)->andScoreShouldBe('Jane Win');
    }

    protected function earnPoints($john = 0, $jane = 0): self
    {
        $this->game->john->earnPoints($john);
        $this->game->jane->earnPoints($jane);

        return $this;
    }

    protected function andScoreShouldBe($score): self
    {
        $this->assertEquals($this->game->score(), $score);

        return $this;
    }
}
