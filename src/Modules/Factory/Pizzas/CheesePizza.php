<?php

declare(strict_types=1);

namespace App\Modules\Factory\Pizzas;

class CheesePizza extends Pizza
{
    public function prepare(): string
    {
        return 'Готовим сырную пиццу.';
    }

    public function bake(): string
    {
        return 'Запекаем пиццу при 200 гр.';
    }
}