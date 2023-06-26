<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

class Squeak implements QuackBehavior
{
    public function quack(): string
    {
        return 'ПИСК';
    }
}