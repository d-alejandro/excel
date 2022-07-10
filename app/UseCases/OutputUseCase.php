<?php

namespace App\UseCases;

use App\Repositories\Interfaces\OutputRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OutputUseCase implements Interfaces\OutputUseCaseInterface
{
    public function __construct(
        private OutputRepositoryInterface $outputRepository
    ) {
    }

    public function execute(string $fileName): Collection
    {
        return $this->outputRepository->make($fileName);
    }
}
