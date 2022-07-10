<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'excel_id',
        'excel_name',
        'excel_date',
    ];
}
