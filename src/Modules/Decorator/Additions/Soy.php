<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Additions;

use App\Modules\Decorator\Beverages\BeverageSize;

class Soy extends Decorator
{
    public function cost(): float
    {
        $cost = $this->wrappedObject->cost();
        $cost += match ($this->getSize()) {
            BeverageSize::Small => 50.5,
            BeverageSize::Middle => 70.2,
            BeverageSize::Big => 100,
        };
        return $cost;
    }

    public function  getDescription(): string
    {
        return $this->wrappedObject->getDescription() . ' с соей';
    }
}