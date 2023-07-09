<?php

declare(strict_types=1);

namespace App\Modules\Observer;

interface DisplayElement
{
    public function display(): string;
}