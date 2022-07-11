<?php

namespace App\UseCases;

use App\Http\Requests\ImportFileRequest;
use App\Imports\ExcelImport;
use App\Repositories\Interfaces\RedisProgressRepositoryInterface;
use App\UseCases\Interfaces\ImportFileUseCaseInterface;
use Maatwebsite\Excel\Facades\Excel;

class ImportFileUseCase implements ImportFileUseCaseInterface
{
    private const REQUEST_FIELD_IMPORT_FILE = 'import_file';
    private const STORE_DISK_NAME = 'files';

    public function execute(ImportFileRequest $request): array
    {
        $file = $request->file(self::REQUEST_FIELD_IMPORT_FILE)->store('/', self::STORE_DISK_NAME);

        $redisProgressRepository = resolve(RedisProgressRepositoryInterface::class);

        $excelImport = new ExcelImport($file, $redisProgressRepository);

        Excel::queueImport($excelImport, $file, self::STORE_DISK_NAME);

        return [
            'message' => __('Import completed successfully.'),
            'file' => $file,
        ];
    }
}
