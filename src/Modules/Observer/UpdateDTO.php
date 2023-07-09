<?php

declare(strict_types=1);

namespace App\Modules\Observer;

class UpdateDTO
{
    public function __construct(
        public ?float $temp,
        public ?float $humidity,
        public ?float $pressure
    ) {
    }
}