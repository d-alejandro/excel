<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RedisProgressRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class RedisProgressRepository implements RedisProgressRepositoryInterface
{
    public function save(string $fileName, int $rowCount): void
    {
        $redis = Redis::connection();
        $redis->set($fileName, $rowCount);
    }
}
