<?php

namespace App\Providers;

use App\Repositories\Interfaces\OutputRepositoryInterface;
use App\Repositories\Interfaces\RedisProgressRepositoryInterface;
use App\Repositories\OutputRepository;
use App\Repositories\RedisProgressRepository;
use App\UseCases\ImportFileUseCase;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use App\UseCases\Interfaces\OutputUseCaseInterface;
use App\UseCases\OutputUseCase;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImportFileUseCaseInterface::class, ImportFileUseCase::class);
        $this->app->bind(OutputUseCaseInterface::class, OutputUseCase::class);

        $this->app->bind(RedisProgressRepositoryInterface::class, RedisProgressRepository::class);
        $this->app->bind(OutputRepositoryInterface::class, OutputRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
