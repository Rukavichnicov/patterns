<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

interface QuackBehavior
{
    public function quack(): string;
}