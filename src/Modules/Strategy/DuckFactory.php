<?php

declare(strict_types=1);

namespace App\Modules\Strategy;

use App\Modules\Strategy\Behavior\FlyNoWay;
use App\Modules\Strategy\Behavior\FlyWithWings;
use App\Modules\Strategy\Behavior\Quack;

class DuckFactory
{
    public function createDuck($type = 'MallardDuck'): Duck
    {
        return match ($type) {
            'MallardDuck', 'default' => new MallardDuck(new FlyWithWings(), new Quack()),
            'Model' => new ModelDuck(new FlyNoWay(), new Quack()),
        };
    }
}