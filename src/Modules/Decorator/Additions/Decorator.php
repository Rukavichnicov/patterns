<?php

declare(strict_types=1);

namespace App\Modules\Decorator\Additions;

use App\Modules\Decorator\Beverages\Beverage;

abstract class Decorator extends Beverage
{
    public function __construct(protected Beverage $wrappedObject)
    {
        $this->setSize($this->wrappedObject->getSize());
    }

    abstract public function cost(): float;
}