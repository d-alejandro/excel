<?php

use App\Http\Controllers\Api\ImportFileController;
use App\Http\Controllers\Api\OutputController;
use Illuminate\Support\Facades\Route;

Route::post('/import', ImportFileController::class)->name('import.file');
Route::get('/output', OutputController::class)->name('output');
