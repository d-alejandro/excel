<?php

namespace App\Imports;

use App\Models\TableRow;
use App\Repositories\Interfaces\RedisProgressRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ExcelImport implements ToModel, WithCalculatedFormulas, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    use RemembersRowNumber;

    private const BATCH_SIZE = 1000;
    private const CHUNK_SIZE = 1000;

    public function __construct(
        private string                           $fileName,
        private RedisProgressRepositoryInterface $redisProgressRepository
    ) {
    }

    public function model(array $row): TableRow
    {
        $currentRowNumber = $this->getRowNumber();
        $this->redisProgressRepository->save($this->fileName, $currentRowNumber);

        return new TableRow([
            TableRow::COLUMN_FILE_NAME => $this->fileName,
            TableRow::COLUMN_EXCEL_ID => (int)$row['id'],
            TableRow::COLUMN_EXCEL_NAME => (string)$row['name'],
            TableRow::COLUMN_EXCEL_DATE => Date::excelToDateTimeObject($row['date']),
        ]);
    }

    public function batchSize(): int
    {
        return self::BATCH_SIZE;
    }

    public function chunkSize(): int
    {
        return self::CHUNK_SIZE;
    }
}
