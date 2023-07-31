<?php

declare(strict_types=1);

namespace App\Modules\Factory\Pizzas;

class VeggiePizza extends Pizza
{
    public function prepare(): string
    {
        return 'Готовим вегетарианскую пиццу.';
    }

    public function bake(): string
    {
        return 'Запекаем пиццу при 300 гр.';
    }
}