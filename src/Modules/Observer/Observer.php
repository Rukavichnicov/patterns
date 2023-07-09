<?php

declare(strict_types=1);

namespace App\Modules\Observer;

interface Observer
{
    public function update(UpdateDTO $updateDto): void;
}