<?php

declare(strict_types=1);

namespace App\Modules\Observer\Display;

use App\Modules\Observer\DisplayElement;
use App\Modules\Observer\Observer;
use App\Modules\Observer\Subject;
use App\Modules\Observer\UpdateDTO;

class StatisticsDisplay implements DisplayElement, Observer
{
    private array $temperature;
    private array $humidity;
    private array $pressure;

    public function __construct(private Subject $weatherData)
    {
        $this->weatherData->registerObserver($this);
    }

    // Данные можно передавать всегда при обновлении в явном виде через параметры
    public function update(UpdateDTO $updateDto): void
    {
        $this->temperature[] = $updateDto->temp;
        $this->humidity[] = $updateDto->humidity;
        $this->pressure[] = $updateDto->pressure;
    }

    private function getAverageTemperature(): float
    {
        return round(array_sum($this->temperature)/count($this->temperature), 2);
    }

    private function getAverageHumidity(): float
    {
        return round(array_sum($this->humidity)/count($this->humidity), 2);
    }

    private function getAveragePressure(): float
    {
        return round(array_sum($this->pressure)/count($this->pressure), 2);
    }

    public function display(): string
    {
        $averageTemperature = $this->getAverageTemperature();
        $averageHumidity = $this->getAverageHumidity();
        $averagePressure = $this->getAveragePressure();
        return "Средняя температура: $averageTemperature, средняя влажность: $averageHumidity, среднее давление: $averagePressure";
    }
}