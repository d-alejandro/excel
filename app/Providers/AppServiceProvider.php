<?php

namespace App\Providers;

use App\UseCases\ImportFileUseCase;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImportFileUseCaseInterface::class, ImportFileUseCase::class);
    }

    public function boot(): void
    {
        //
    }
}
