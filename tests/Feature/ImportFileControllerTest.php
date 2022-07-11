<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImportFileControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuccessfulExecution(): void
    {
        $path = storage_path('app/test/test.xlsx');

        $file = new UploadedFile($path, 'test.xlsx', test: true);

        $response = $this->json('POST', route('import.file'), [
            'import_file' => $file,
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'message' => 'Import completed successfully.',
            ]);
    }

    public function testValidationError(): void
    {
        $sizeInKilobytes = 700;
        $file = UploadedFile::fake()->create('test.xlsx', $sizeInKilobytes);

        $response = $this->json('POST', route('import.file'), [
            'import_file' => $file,
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'import_file',
                ],
            ]);
    }
}
