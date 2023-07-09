<?php

declare(strict_types=1);

namespace App\Modules\Observer;

class WeatherData implements Subject
{
    private float $temperature;
    private float $humidity;
    private float $pressure;

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

    public function __construct(
        private array $observers = []
    ) {

    }

    public function registerObserver(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer): void
    {
        foreach ($this->observers as $key => $instance) {
            if ($instance === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notifyObservers(): void
    {
        $updateDTO = new UpdateDTO(
            $this->temperature,
            $this->humidity,
            $this->pressure,
        );
        foreach ($this->observers as $observer) {
            $observer->update($updateDTO);
        }
    }

    public function measurementsChanged(): void
    {
        $this->notifyObservers();
    }

    public function setMeasurements(
        float $temp,
        float $humidity,
        float $pressure
    ) {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}