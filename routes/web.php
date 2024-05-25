<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\MessageController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
});

Route::prefix('v1/auth')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('layouts.home');
    });

    Route::prefix('v1/message')->controller(MessageController::class)->group(function () {
        Route::post('/send', 'sendMessage');
        Route::get('/get/{userId}', 'getAllMessagesForUser');
    });

    Route::get('v1/user', [AuthController::class, 'getAllData']);
    Route::get('/chat/{id}', function () {
        return view('layouts.chat');
    });
});
