<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1/auth')->controller(AuthController::class)->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::prefix('v1/message')->controller(MessageController::class)->group(function() {
    Route::post('send', 'sendMessage');
    Route::post('login', 'login');
});