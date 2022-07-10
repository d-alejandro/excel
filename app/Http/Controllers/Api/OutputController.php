<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutputRequest;
use App\UseCases\Interfaces\OutputUseCaseInterface;
use Illuminate\Http\Response;

class OutputController extends Controller
{
    public function __construct(
        private OutputUseCaseInterface $outputUseCase
    ) {
    }

    public function __invoke(OutputRequest $request): Response
    {
        $response = $this->outputUseCase->execute($request->file_name);

        return response(['data' => $response], Response::HTTP_OK);
    }
}
