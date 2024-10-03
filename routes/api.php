<?php

use App\Http\Controllers\{ExcelColumnController, CaesarCipherController, JsonFlattenerController, AuthController};
use Illuminate\Support\Facades\Route;


Route::get('/number-to-excel-column', ExcelColumnController::class)->name('excel');
Route::get('/caesar-encode', CaesarCipherController::class)->name('caesar');
Route::get('/json-flattener', JsonFlattenerController::class)->name('flattener');


Route::post('/login', AuthController::class);
