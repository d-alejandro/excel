<?php

namespace App\UseCases\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface OutputUseCaseInterface
{
    public function execute(string $fileName): Collection;
}
