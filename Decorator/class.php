<?php
require_once('./interfaces.php');
class Espresso extends Beverage
{
    protected $description = 'Espresso';
    public function cost(): float
    {
        return 1.99;
    }
}

class HouseBlend extends Beverage
{
    protected $description = "House Blend Coffee";
    public function cost(): float
    {
        return 0.89;
    }
}

class Mocha extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' , Mocha';
    }
    
    public function cost(): float 
    {
        return $this->beverage->cost() + 0.20;
    }
}

class Soy extends CondimentDecorator
{

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' , Soy';
    }
    
    public function cost(): float 
    {
        return $this->beverage->cost() + 0.15;
    }
}

class Whip extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ' , Whip';
    }
    
    public function cost(): float 
    {
        return $this->beverage->cost() + 0.15;
    }
}

$beverage = new Espresso;
echo $beverage->getDescription() . ' $' . $beverage->cost() . '<br>';

$beverage2 = new HouseBlend;
$beverage2 = new Mocha($beverage2);
$beverage2 = new Mocha($beverage2);
$beverage2 = new Whip($beverage2);
echo $beverage2->getDescription() . ' $' . $beverage2->cost(). '<br>';

$beverage3 = new HouseBlend;
$beverage3 = new Soy($beverage3);
$beverage3 = new Mocha($beverage3);
$beverage3 = new Whip($beverage3);
echo $beverage3->getDescription() . ' $' . $beverage3->cost(). '<br>';

?>