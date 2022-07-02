<?php
abstract class Beverage {
    protected $description;
    public function getDescription() {
        return $this->description;
    }

    abstract public function cost(): float;
    }

abstract class CondimentDecorator extends Beverage {
    protected $beverage;
    function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription(): string {
        return $this->beverage->description;
    }
}

?>