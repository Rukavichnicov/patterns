<?php

declare(strict_types=1);

namespace App\Modules\Factory;

use App\Modules\Factory\Factories\SimplePizzaFactory;
use App\Modules\Factory\Pizzas\CheesePizza;
use App\Modules\Factory\Pizzas\PepperoniPizza;
use App\Modules\Factory\Pizzas\Pizza;
use App\Modules\Factory\Pizzas\VeggiePizza;

class PizzaStore
{
    public function __construct(private SimplePizzaFactory $simplePizzaFactory)
    {

    }

    public function orderPizza(string $type): string
    {
        $pizza = $this->simplePizzaFactory->createPizza($type);
        $result = $pizza->prepare() . ' ';
        $result .= $pizza->bake() . ' ';
        $result .= $pizza->cut() . ' ';
        $result .= $pizza->box();
        return $result;
    }
}