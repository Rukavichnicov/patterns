<?php
abstract class Pizza
{
    protected $name;
    protected $dough;
    protected $veggies = array();
    protected $sauce;
    protected $cheese;
    protected $pepperoni;
    protected $clam;

    abstract public function prepare();

    public function bake()
    {
        echo "Bake for 25 minutes at 350". '<br>';
    }
 
    public function cut()
    {
        echo "Cutting the pizza into diagonal slices". '<br>';
    }
  
    public function box()
    {
        echo "Place pizza in official PizzaStore box". '<br>';
    }
 
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}

class CheesePizza extends Pizza
{
    protected $pizzaIngredientFactory;
    public function __construct($pizzaIngredientFactory)
    {
        $this->pizzaIngredientFactory = $pizzaIngredientFactory;
    }
    public function prepare()
    {
        echo "Preparing " . $this->name;
        $this->dough = $this->pizzaIngredientFactory->createDough();
        $this->sauce = $this->pizzaIngredientFactory->createSauce();
        $this->cheese = $this->pizzaIngredientFactory->createCheese();
    }
}

class ClamPizza extends Pizza
{
    protected $pizzaIngredientFactory;
    public function __construct($pizzaIngredientFactory)
    {
        $this->pizzaIngredientFactory = $pizzaIngredientFactory;
    }
    public function prepare()
    {
        echo "Preparing " . $this->name;
        $this->dough = $this->pizzaIngredientFactory->createDough();
        $this->sauce = $this->pizzaIngredientFactory->createSauce();
        $this->cheese = $this->pizzaIngredientFactory->createCheese();
        $this->clam = $this->pizzaIngredientFactory->createClam();
    }
}

//class NYStyleCheesePizza extends Pizza
//{
//    public function __construct()
//    { 
//        $this->name = "NY Style Sauce and Cheese Pizza";
//        $this->dough = "Thin Crust Dough";
//        $this->sauce = "Marinara Sauce";
//        $this->toppings[] = ("Grated Reggiano Cheese");
//    }
//}
//
//class ChicagoStyleCheesePizza extends Pizza
//{
//    public function __construct()
//    { 
//        $this->name = "Chicago Style Deep Dish Cheese Pizza";
//        $this->dough = "Extra Thick Crust Dough";
//        $this->sauce = "Plum Tomato Sauce";
//        $this->toppings[] = ("Shredded Mozzarella Cheese");
//    }
//
//    public function cut()
//    {
//        echo "Cutting the pizza into square slices". '<br>';
//    }
//}

interface PizzaIngredientFactory
{
    public function createDough();
    public function createSauce();
    public function createCheese();
    public function createVeggies();
    public function createPepperoni();
    public function createClam();
}

class NYPizzaIngredientFactory implements PizzaIngredientFactory
{
 
    public function createDough()
    {
        return new ThinCrustDough();
    }
 
    public function createSauce()
    {
        return new MarinaraSauce();
    }
 
    public function createCheese()
    {
        return new ReggianoCheese();
    }
 
    public function createVeggies() 
    {
        $veggies = [new Garlic(), new Onion(), new Mushroom(), new RedPepper()];
        return $veggies;
    }
 
    public function createPepperoni()
    {
        return new SlicedPepperoni();
    }
    public function createClam()
    {
        return new FreshClams();
    }
}

class ChicagoPizzaIngredientFactory implements PizzaIngredientFactory
{
 
    public function createDough()
    {
        return new ThickCrustDough();
    }
 
    public function createSauce()
    {
        return new PlumTomatoSauce();
    }
 
    public function createCheese()
    {
        return new MozzarellaCheese();
    }
 
    public function createVeggies() 
    {
        $veggies = [new BlackOlives(), new Spinach(), new EggPlant(), new RedPepper()];
        return $veggies;
    }
 
    public function createPepperoni()
    {
        return new SlicedPepperoni();
    }
    public function createClam()
    {
        return new FrozenClams();
    }
}


?>