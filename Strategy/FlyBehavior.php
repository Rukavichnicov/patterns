<?php
interface FlyBehavior {
    public function fly();
}

class FlyWithWinds implements FlyBehavior {
    public function fly() {
        echo "Я летаю";
    }
}

class FlyNoWay implements FlyBehavior {
    public function fly() {
        echo "Я НЕ летаю";
    }
}

class FlyRocketPowered implements FlyBehavior {
    public function fly() {
        echo "Я лечу на ракете";
    }
}
?>