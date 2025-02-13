<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', [UserController::class, 'index']);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

