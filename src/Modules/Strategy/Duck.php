<?php

declare(strict_types=1);

namespace App\Modules\Strategy;

use App\Modules\Strategy\Behavior\FlyBehavior;
use App\Modules\Strategy\Behavior\QuackBehavior;

abstract class Duck
{
    public function __construct(private FlyBehavior $flyBehavior, private QuackBehavior $quackBehavior)
    {
    }

    public function setFlyBehavior(FlyBehavior $flyBehavior): void
    {
        $this->flyBehavior = $flyBehavior;
    }

    public function setQuackBehavior(QuackBehavior $quackBehavior): void
    {
        $this->quackBehavior = $quackBehavior;
    }

    public function performFly(): string
    {
        return $this->flyBehavior->fly();
    }

    public function performQuack(): string
    {
        return $this->quackBehavior->quack();
    }

    public function display(): string
    {
        return 'Я утка';
    }

    public function swim(): string
    {
        return 'Я плаваю';
    }
}