<?php
require_once('./SimplePizzaFactory.php');
require_once('./Pizza.php');
abstract class PizzaStore {
    protected $factory;
    protected $pizza;
    protected $iningredientFactory;
//   public function __construct(SimplePizzaFactory $factory)
//   {
//       $this->factory = $factory;
//   }

    public function orderPizza($type) {
//      $this->pizza = $this->factory->createPizza($type);
      $this->pizza = $this->createPizza($type);
      $this->pizza->prepare();
      $this->pizza->bake();
      $this->pizza->cut();
      $this->pizza->box();

      return $this->pizza;
    }

    protected abstract function createPizza($type);
}

class NYPizzaStore extends PizzaStore 
{
  public function __construct()
  {
    $this->iningredientFactory = new NYPizzaIngredientFactory();
  }
  protected function createPizza($type)
  {
    $pizza = null;
    if ($type == "cheese")
    {
      $pizza = new CheesePizza($this->iningredientFactory);
      $pizza->setName("New York Style Cheese Pizza");
    }
 //   else if ($type == "veggie") 
 //   {
 //   $pizza = new VeggiePizza($this->iningredientFactory);
 //   $pizza->setName("New York Style Veggie Pizza");
 //   }
 //   else if ($type == "clam") 
 //   {
 //   $pizza = new ClamPizza($this->iningredientFactory);
//   $pizza->setName("New York Style Clam Pizza");
 //   }
 //   else if ($type == "pepperoni") 
 //   {
 //   $pizza = new PepperoniPizza($this->iningredientFactory);
 //   $pizza->setName("New York Style Pepperoni Pizza");
 //   } 
    return $pizza;
  }
}

class ChicagoPizzaStore extends PizzaStore 
{ 
  protected function createPizza($type)
  {
    $pizza = null;
    if ($type == "cheese")
    {
        $pizza = new ChicagoStyleCheesePizza();
    }
 //   else if ($type == "pepperoni") 
 //   {
 //       $pizza = new ChicagoStylePepperoniPizza();
 //   }
 //   else if ($type == "clam") 
 //   {
 //       $pizza = new ChicagoStyleClamPizza();
 //   }
 //   else if ($type == "veggie") 
 //   {
 //       $pizza = new ChicagoStyleVeggiePizza();
 //   } 
    return $pizza;
  }
}

      $nyPizzaStore = new NYPizzaStore();
      $nyPizzaStore->orderPizza("cheese");
      $chicagoStore = new ChicagoPizzaStore();

      $pizza = $nyStore->orderPizza("cheese");
      echo "Ethan ordered a " . $pizza->getName() . "<br>";
      echo "<br>";
      $pizza = $chicagoStore->orderPizza("cheese");
      echo "Joel ordered a " . $pizza->getName() . "<br>";
?>