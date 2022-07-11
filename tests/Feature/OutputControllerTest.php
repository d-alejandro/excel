<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class OutputControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuccessfulExecution(): void
    {
        $path = storage_path('app/test/test.xlsx');

        $file = new UploadedFile($path, 'test.xlsx', test: true);

        $initialResponse = $this->json('POST', route('import.file'), [
            'import_file' => $file,
        ]);

        $responseFile = $initialResponse['file'];

        $response = $this->json('GET', route('output'), [
            'file_name' => $responseFile,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['data']);
    }

    public function testValidationError(): void
    {
        $response = $this->json('GET', route('output'), [
            'file_name' => 'not_exist.xlsx',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'file_name',
                ],
            ]);
    }
}
