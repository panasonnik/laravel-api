<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\MyController;

Route::get('/', function () {
    return view('layout.app');
});
Route::get('/categories', [MyController::class, 'categories']);
Route::get('/category/{id}/items', [MyController::class, 'relatedItems']);
