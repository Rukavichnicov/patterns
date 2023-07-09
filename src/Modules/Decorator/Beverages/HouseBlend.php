<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Beverages;

class HouseBlend extends Beverage
{
    public function __construct(BeverageSize $size)
    {
        $this->setDescription('Домашняя смесь');
        $this->setSize($size);
    }

    public function cost(): float
    {
        return match ($this->getSize()) {
            BeverageSize::Small => 100,
            BeverageSize::Middle => 102.5,
            BeverageSize::Big => 105,
        };
    }
}