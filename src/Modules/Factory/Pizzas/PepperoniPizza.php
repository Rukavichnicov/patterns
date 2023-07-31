<?php

declare(strict_types=1);

namespace App\Modules\Factory\Pizzas;

class PepperoniPizza extends Pizza
{
    public function prepare(): string
    {
        return 'Готовим пиццу с пеперони.';
    }

    public function box(): string
    {
        return 'Упаковать и обернуть!';
    }
}