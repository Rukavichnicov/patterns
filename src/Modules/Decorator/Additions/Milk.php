<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Additions;

use App\Modules\Decorator\Beverages\BeverageSize;

class Milk extends Decorator
{
    public function cost(): float
    {
        $cost = $this->wrappedObject->cost();
        $cost += match ($this->getSize()) {
                    BeverageSize::Small => 10.5,
                    BeverageSize::Middle => 11.5,
                    BeverageSize::Big => 100,
                };
        return $cost;
    }

    public function  getDescription(): string
    {
        return $this->wrappedObject->getDescription() . ' с молоком';
    }
}