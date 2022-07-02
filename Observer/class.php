<?php
require_once('interfaces.php');
class WeaterData implements Subject {
    private $observers = [];
    private $temperature;
    private $humidity;
    private $pressure;

    public function registerObserver($Observer) {
        $this->observers[] = $Observer;
    }
    public function removeObserver($Observer) {
        $index = array_search($Observer, $this->observers);
        array_splice($this->observers, $index, 1);
    }
    public function notifyObservers() {
        foreach ($this->observers as $Observer) {
            $Observer->update();
        }
    }
    public function measurementsChanged() {
        $this->notifyObservers();
    }
    public function setMeasurements($temperature, $humidity, $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
    public function getTemperature() {
        return $this->temperature;
    }
    public function getHumidity() {
        return $this->humidity;
    }
}

class CurrentConditonsDisplay implements Observer, DisplayElement {
    private $temperature;
    private $humidity;
    private $weatherData;

    public function CurrentConditonsDisplay_($WeaterData) {
        $this->weatherData = $WeaterData;
        $this->weatherData->registerObserver($this);
    }
    public function update() {
        $this->temperature = $this->weatherData->getTemperature();
        $this->humidity = $this->weatherData->getHumidity();
        $this->display();
    }
    private function computeHeatIndex($t, $rh) {
        $index = ((16.923 + (0.185212 * $t) + (5.37941 * $rh) - (0.100254 * $t * $rh) +
            (0.00941695 * ($t * $t)) + (0.00728898 * ($rh * $rh)) +
            (0.000345372 * ($t * $t * $rh)) - (0.000814971 * ($t * $rh * $rh)) +
            (0.0000102102 * ($t * $t * $rh * $rh)) - (0.000038646 * ($t * $t * $t)) + (0.0000291583 *  
            ($rh * $rh * $rh)) + (0.00000142721 * ($t * $t * $t * $rh)) +
            (0.000000197483 * ($t * $rh * $rh * $rh)) - (0.0000000218429 * ($t * $t * $t * $rh * $rh)) +     
            0.000000000843296 * ($t * $t * $rh * $rh * $rh)) -
            (0.0000000000481975 * ($t * $t * $t * $rh * $rh * $rh)));
        return $index;
    }
    public function display() {
        echo "Текущая температура: $this->temperature, а влажность: $this->humidity <br>";
        echo 'Индекс: ' .$this->computeHeatIndex($this->temperature, $this->humidity);
    }    
}



$WeaterData = new WeaterData;
$CurrentConditonsDisplay = new CurrentConditonsDisplay();
$CurrentConditonsDisplay->CurrentConditonsDisplay_($WeaterData);
$WeaterData->setMeasurements(30, 50, 100);
echo '<br>';
$WeaterData->setMeasurements(50, 60, 1000);
echo '<br>';
$WeaterData->setMeasurements(1220, 1233120, 1000);
