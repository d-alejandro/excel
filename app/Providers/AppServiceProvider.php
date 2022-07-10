<?php

namespace App\Providers;

use App\Repositories\Interfaces\RedisProgressRepositoryInterface;
use App\Repositories\RedisProgressRepository;
use App\UseCases\ImportFileUseCase;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImportFileUseCaseInterface::class, ImportFileUseCase::class);
        $this->app->bind(RedisProgressRepositoryInterface::class, RedisProgressRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
