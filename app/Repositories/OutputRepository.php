<?php

namespace App\Repositories;

use App\Models\TableRow;
use App\Repositories\Interfaces\OutputRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OutputRepository implements OutputRepositoryInterface
{
    public function make(string $fileName): Collection
    {
        return TableRow::where('file_name', $fileName)
            ->selectRaw("excel_id, excel_name, date_format(excel_date, '%d.%m.%Y') excel_date")
            ->orderBy('table_rows.excel_date')
            ->paginate()
            ->groupBy('excel_date');
    }
}
