<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Beverages;

class Espresso extends Beverage
{
    public function __construct(BeverageSize $size)
    {
        $this->setDescription('Эспрессо');
        $this->setSize($size);
    }

    public function cost(): float
    {
        return match ($this->getSize()) {
            BeverageSize::Small => 70,
            BeverageSize::Middle => 75,
            BeverageSize::Big => 85,
        };
    }
}