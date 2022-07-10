<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface OutputRepositoryInterface
{
    public function make(string $fileName): Collection;
}
