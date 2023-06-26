<?php

namespace App\Modules\Strategy;

class ModelDuck extends Duck
{
    public function display(): string
    {
        return 'Я лишь модель, плак плак';
    }
}