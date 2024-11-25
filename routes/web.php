<?php

use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', [TesteController::class, 'index'])->name('deletarDocuments');

Route::get('/items', [ItemController::class, 'index']);
Route::post('/items/update-order', [ItemController::class, 'updateOrder']);
