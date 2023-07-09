<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Beverages;

class DarkRoast extends Beverage
{
    public function __construct(BeverageSize $size)
    {
        $this->setDescription('Тёмный ображенный кофе');
        $this->setSize($size);
    }

    public function cost(): float
    {
        return match ($this->getSize()) {
            BeverageSize::Small => 50,
            BeverageSize::Middle => 70,
            BeverageSize::Big => 100,
        };
    }
}