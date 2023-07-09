<?php

declare(strict_types=1);

namespace App\Modules\Observer\Display;

use App\Modules\Observer\DisplayElement;
use App\Modules\Observer\Observer;
use App\Modules\Observer\Subject;
use App\Modules\Observer\UpdateDTO;
use App\Modules\Observer\WeatherData;

class CurrentConditionsDisplay implements DisplayElement, Observer
{
    private float $temperature;
    private float $humidity;

    /**
     * @param WeatherData $weatherData
     */
    public function __construct(private Subject $weatherData)
    {
        $this->weatherData->registerObserver($this);
    }

    // Наблюдатель может запрашивать данные у субъкта самостоятельно через геттеры
    public function update(UpdateDTO $updateDto): void
    {
        $this->temperature = $this->weatherData->getTemperature();
        $this->humidity = $this->weatherData->getHumidity();
    }

    public function display(): string
    {
        return "Текущая температура: $this->temperature, текущая влажность: $this->humidity";
    }
}