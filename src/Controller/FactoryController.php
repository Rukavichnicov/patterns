<?php

namespace App\Controller;

use App\Modules\Factory\PizzaStore;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FactoryController extends AbstractController
{
    #[Route('factory/simple')]
    public function runSimpleFactory(PizzaStore $pizzaStore)
    {
        $orderResultCheese = $pizzaStore->orderPizza('cheese');
        $orderResulVeggie = $pizzaStore->orderPizza('veggie');
        $orderResulPepperoni = $pizzaStore->orderPizza('pepperoni');

        return $this->render('factory/simple.html.twig', [
            'orderResultCheese' => $orderResultCheese,
            'orderResultVeggie' => $orderResulVeggie,
            'orderResultPepperoni' => $orderResulPepperoni,
        ]);
    }
}