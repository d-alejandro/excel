<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportFileRequest;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ImportFileController extends Controller
{
    public function __construct(
        private ImportFileUseCaseInterface $importFileUseCases
    ) {
    }

    public function __invoke(ImportFileRequest $request): Response
    {
        try {
            $response = $this->importFileUseCases->execute($request);

            return response($response, Response::HTTP_OK);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());

            return response(
                ['message' => __('Import failed.')],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
