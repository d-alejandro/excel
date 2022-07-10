<?php

namespace App\UseCases\Interfaces;

use App\Http\Requests\ImportFileRequest;

interface ImportFileUseCaseInterface
{
    public function execute(ImportFileRequest $request): array;
}
