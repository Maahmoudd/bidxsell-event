<?php

use App\Http\Controllers\ExcelColumnController;
use Illuminate\Support\Facades\Route;


Route::get('/number-to-excel-column', ExcelColumnController::class)->name('excel');
