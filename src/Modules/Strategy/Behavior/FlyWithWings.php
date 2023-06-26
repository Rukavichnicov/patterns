<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

class FlyWithWings implements FlyBehavior
{

    public function fly(): string
    {
        return 'Я летаю!!!';
    }
}