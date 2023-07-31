<?php

declare(strict_types=1);

namespace App\Modules\Factory\Pizzas;

abstract class Pizza
{
    public function prepare(): string
    {
        return 'Готовим пиццу.';
    }

    public function bake(): string
    {
        return 'Запекаем пиццу.';
    }

    public function cut(): string
    {
        return 'Нарезаем на 8 частей.';
    }

    public function box(): string
    {
        return 'Упаковать!';
    }
}