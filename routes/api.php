<?php

use Illuminate\Support\Facades\Route;

/** Modules */
use App\Http\Controllers\API\SMSController;
use App\Http\Controllers\API\AuthController;

Route::group(['prefix' => 'v1'], function() {
    // AUTH API
    Route::group(['prefix' => 'auth'], function() {
        Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
        Route::post('logout', [AuthController::class, 'logout'])->name('api.auth.logout')->middleware('auth:sanctum');
    });

    // SMS API
    Route::group(['prefix' => 'sms'], function() {
        Route::post('send', [SMSController::class, 'send'])->name('api.sms.send');
    });
});
