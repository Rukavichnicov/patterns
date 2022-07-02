<?php
interface QuackBehavior {
    public function quack();
}

class Quack1 implements QuackBehavior {
    public function quack() {
        echo "КРЯ КРЯ";
    }
}

class MuteQuack implements QuackBehavior {
    public function quack() {
        echo "молчание...";
    }
}

class Squeak implements QuackBehavior {
    public function quack() {
        echo "Скрип";
    }
}
?>