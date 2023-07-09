<?php

namespace App\Controller;

use App\Modules\Observer\Display\CurrentConditionsDisplay;
use App\Modules\Observer\Display\StatisticsDisplay;
use App\Modules\Observer\WeatherData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ObserverController extends AbstractController
{
    #[Route('observer')]
    public function runObserever()
    {
        $weatherData = new WeatherData();
        $currentConditionsDisplay = new CurrentConditionsDisplay($weatherData);
        $statisticDisplay = new StatisticsDisplay($weatherData);
        $weatherData->setMeasurements(30, 65, 740);
        $weatherData->setMeasurements(10, 70, 739);
        $weatherData->setMeasurements(25, 90, 720);

        return $this->render('observer/index.html.twig', [
            'currentConditionsDisplay' => $currentConditionsDisplay->display(),
            'statisticDisplay' => $statisticDisplay->display(),
        ]);
    }
}