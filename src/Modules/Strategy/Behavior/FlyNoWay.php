<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

class FlyNoWay implements FlyBehavior
{
    public function fly(): string
    {
        return 'Не всем суждено летать(((';
    }
}