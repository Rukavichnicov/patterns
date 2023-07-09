<?php

namespace App\Controller;

use App\Modules\Decorator\Additions\Milk;
use App\Modules\Decorator\Additions\Soy;
use App\Modules\Decorator\Beverages\BeverageSize;
use App\Modules\Decorator\Beverages\DarkRoast;
use App\Modules\Decorator\Beverages\Espresso;
use App\Modules\Decorator\Beverages\HouseBlend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DecoratorController extends AbstractController
{
    #[Route('decorator')]
    public function runDecorator()
    {
        $darkRoast = new DarkRoast(BeverageSize::Big);
        $darkRoast = new Milk($darkRoast);
        $darkRoast = new Soy($darkRoast);
        $espresso = new Espresso(BeverageSize::Middle);
        $espresso = new Soy($espresso);
        $houseBlend = new HouseBlend(BeverageSize::Middle);
        $beveragesObjects = [$darkRoast, $espresso, $houseBlend];
        $beverages = [];
        foreach ($beveragesObjects as $beverage) {
            $beverages[] = [
                'description' => $beverage->getDescription(),
                'cost' => $beverage->cost(),
            ];
        }

        return $this->render('decorator/index.html.twig', [
            'beverages' => $beverages,
        ]);
    }
}