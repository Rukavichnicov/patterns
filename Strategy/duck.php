<?php
require_once('./FlyBehavior.php');
require_once('./QuackBehavior.php');
class Duck {
    public $FlyBehavior;
    public $QuackBehavior;
    public $Duck;
    public $display;

    public function __construct() {
        $this->FlyBehavior = new flyBehavior;
        $this->QuackBehavior = new quackBehavior;
    } 

    public function display() {
    }

    public function performFly() {
        $this->FlyBehavior->fly();
    }
    public function performQuack() {
        $this->QuackBehavior->quack();
    }
    public function setFlyBehavior ($fb) {
        $this->FlyBehavior = $fb;
    }
    public function setQuackBehavior ($qb) {
        $this->QuackBehavior = $qb;
    }
    public function swim() {
        echo "Все утки плавают, даже подсадные утки";
    }
}

class MallardDuck extends Duck {
    public function __construct() {
        $this->FlyBehavior = new FlyWithWinds;
        $this->QuackBehavior = new Quack1;
    } 
    public function display() {
        echo "Я утка маллард.";
    }
}

Class ModelDuck extends Duck {
    public function __construct() {
        $this->FlyBehavior = new FlyNoWay();
        $this->QuackBehavior = new Quack1();
    } 
    public function display() {
    echo 'Я модель утки';
    }
}
    
$Duck = new MallardDuck;
$Duck->performFly();
echo '<br>';
$Duck->performQuack();
echo '<br>';
$model = new ModelDuck;
$model->performFly();
echo '<br>';
$model->setFlyBehavior(new FlyRocketPowered);
$model->performFly();

?>