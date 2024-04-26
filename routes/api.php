<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('/auth')->name('auth.')->controller(Controllers\Api\AuthController::class)->group(function() {
    Route::post('/register', 'register')->name('register');
});

Route::prefix('/users')->name('users.')->middleware('auth:api')->controller(Controllers\UserController::class)->group(function() {
    Route::get('/me','getCurrentUser')->name('me');
    Route::get('/items','getUserProducts')->name('items');

});
