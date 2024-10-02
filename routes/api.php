<?php

use App\Http\Controllers\ExcelColumnController;
use App\Http\Controllers\CaesarCipherController;
use Illuminate\Support\Facades\Route;


Route::get('/number-to-excel-column', ExcelColumnController::class)->name('excel');
Route::get('/caesar-encode', CaesarCipherController::class)->name('caesar');
