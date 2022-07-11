<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\ImportFileController;
use App\Http\Requests\ImportFileRequest;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use Exception;
use Illuminate\Http\Response;
use Mockery;
use Tests\TestCase;

class ImportFileControllerTest extends TestCase
{
    private ImportFileUseCaseInterface $importFileUseCase;
    private ImportFileController $importFileController;
    private ImportFileRequest $importFileRequestMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->importFileUseCase = Mockery::mock(ImportFileUseCaseInterface::class);

        $this->importFileController = new ImportFileController($this->importFileUseCase);

        $this->importFileRequestMock = Mockery::mock(ImportFileRequest::class);
    }


    public function testSuccessfulExecution(): void
    {
        $this->importFileUseCase
            ->shouldReceive('execute')
            ->once()
            ->with($this->importFileRequestMock)
            ->andReturn([]);

        $response = $this->importFileController->__invoke($this->importFileRequestMock);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());

        $this->assertInstanceOf(Response::class, $response);
    }

    public function testFailedDestroyImportFileUseCasesCall(): void
    {
        $this->importFileUseCase
            ->shouldReceive('execute')
            ->once()
            ->andThrow(new Exception());

        $response = $this->importFileController->__invoke($this->importFileRequestMock);

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());

        $this->assertEquals('Import failed.', $response->original['message']);
    }
}
