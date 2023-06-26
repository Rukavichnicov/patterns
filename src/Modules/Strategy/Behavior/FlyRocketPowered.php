<?php

declare(strict_types=1);

namespace App\Modules\Strategy\Behavior;

class FlyRocketPowered implements FlyBehavior
{
    public function fly(): string
    {
        return 'Ракета это вам не хухры мухры!';
    }
}