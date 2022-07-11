<?php

namespace App\Repositories\Interfaces;

interface RedisProgressRepositoryInterface
{
    public function save(string $fileName, int $rowCount): void;
}
