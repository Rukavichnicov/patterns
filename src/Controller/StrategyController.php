<?php

namespace App\Controller;

use App\Modules\Strategy\Behavior\FlyRocketPowered;
use App\Modules\Strategy\DuckFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StrategyController extends AbstractController
{
    #[Route('strategy/duck')]
    public function runStrategy()
    {
        $duckFactory = new DuckFactory();
        $mallardDuck = $duckFactory->createDuck();
        $modelDuck = $duckFactory->createDuck('Model');
        $changedModelDuck = $duckFactory->createDuck('Model');
        $changedModelDuck->setFlyBehavior(new FlyRocketPowered());

        $ducksObjects = [$mallardDuck, $modelDuck, $changedModelDuck];
        $ducks = [];
        foreach ($ducksObjects as $duck) {
            $ducks[] = [
                'display' => $duck->display(),
                'quack' => $duck->performQuack(),
                'fly' => $duck->performFly(),
                'swim' => $duck->swim(),
            ];
        }

        return $this->render('strategy/duck.html.twig', [
            'ducks' => $ducks,
        ]);
    }
}