<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRow extends Model
{
    use HasFactory;

    public const COLUMN_FILE_NAME = 'file_name';
    public const COLUMN_EXCEL_ID = 'excel_id';
    public const COLUMN_EXCEL_NAME = 'excel_name';
    public const COLUMN_EXCEL_DATE = 'excel_date';

    protected $fillable = [
        self::COLUMN_FILE_NAME,
        self::COLUMN_EXCEL_ID,
        self::COLUMN_EXCEL_NAME,
        self::COLUMN_EXCEL_DATE,
    ];
}
