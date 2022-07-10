<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelTablesTable extends Migration
{

    public function up(): void
    {
        Schema::create('excel_tables', function (Blueprint $table) {
            $table->id();
            $table->string('import_file');
            $table->unsignedBigInteger('file_id');
            $table->string('file_name');
            $table->timestamp('file_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('excel_tables');
    }
}
