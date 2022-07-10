<?php

use App\Http\Controllers\Api\ImportFileController;
use Illuminate\Support\Facades\Route;

Route::post('/import', ImportFileController::class)->name('import.file');;
