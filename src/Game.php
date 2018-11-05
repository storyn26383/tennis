<?php

namespace App;

class Game
{
    public $john;
    public $jane;

    public function __construct(Player $john, Player $jane)
    {
        $this->john = $john;
        $this->jane = $jane;
    }

    public function score(): string
    {
        $scoreMap = ['Love', 'Fiften', 'Thirty', 'Forty'];

        if (($this->john->points >= 3 || $this->jane->points >= 3) && $this->john->points + $this->jane->points >= 5) {
            if ($this->john->points === $this->jane->points) {
                return 'Deuce';
            }

            $name = $this->john->points > $this->jane->points ? 'John' : 'Jane';
            $type = abs($this->john->points - $this->jane->points) === 1 ? 'Adv' : 'Win';

            return "{$name} {$type}";
        }

        if ($this->john->points === $this->jane->points) {
            return "{$scoreMap[$this->john->points]} All";
        }

        return "{$scoreMap[$this->john->points]} {$scoreMap[$this->jane->points]}";
    }
}
