<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Beverages;

abstract class Beverage
{
    private BeverageSize $size;
    private string $description;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getSize(): BeverageSize
    {
        return $this->size;
    }

    public function setSize(BeverageSize $size): void
    {
        $this->size = $size;
    }

    abstract public function cost(): float;
}