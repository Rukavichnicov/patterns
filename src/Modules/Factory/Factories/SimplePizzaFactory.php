<?php

declare(strict_types=1);

namespace App\Modules\Factory\Factories;

use App\Modules\Factory\Pizzas\CheesePizza;
use App\Modules\Factory\Pizzas\PepperoniPizza;
use App\Modules\Factory\Pizzas\Pizza;
use App\Modules\Factory\Pizzas\VeggiePizza;

class SimplePizzaFactory
{
    public function createPizza(string $type): Pizza
    {
        return match($type) {
            'cheese' => new CheesePizza(),
            'veggie' => new VeggiePizza(),
            'pepperoni' => new PepperoniPizza(),
        };
    }
}