<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\MyController;

Route::get('/', function () {
    return view('layout.app');
})->name('login');
