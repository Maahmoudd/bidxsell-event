<?php

use App\Http\Controllers\{ExcelColumnController,
    CaesarCipherController,
    JsonFlattenerController,
    AuthController,
    EventController,
    TicketController};
use Illuminate\Support\Facades\Route;


Route::get('/number-to-excel-column', ExcelColumnController::class)->name('excel');
Route::get('/caesar-encode', CaesarCipherController::class)->name('caesar');
Route::get('/json-flattener', JsonFlattenerController::class)->name('flattener');


Route::post('/login', AuthController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('events', EventController::class)->only(['index', 'store', 'show']);
    Route::post('/purchase-ticket', [TicketController::class, 'store'])->name('purchase-ticket');
});
