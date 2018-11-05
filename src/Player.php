<?php

namespace App;

class Player
{
    public $points = 0;

    public function earnPoints($points): self
    {
        $this->points = $points;

        return $this;
    }
}
