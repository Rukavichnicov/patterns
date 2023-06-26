<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

class MuteQuack implements QuackBehavior
{
    public function quack(): string
    {
        return 'Молчание золото))';
    }
}