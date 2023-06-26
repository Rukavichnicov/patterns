<?php

namespace App\Modules\Strategy;

class MallardDuck extends Duck
{
    public function display(): string
    {
        return 'Я дикая утка';
    }
}