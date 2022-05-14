<?php

use Illuminate\Support\Facades\Route;

/** Modules */
use App\Http\Controllers\API\SMSController;
use App\Http\Controllers\API\AuthController;

Route::group(['prefix' => 'v1'], function() {
    // AUTH API
    Route::prefix('auth')->group(function() {
        Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
    });

    // SMS API
    Route::prefix('sms')->group(function() {
        Route::post('send', [SMSController::class, 'send'])->name('api.sms.send');
    });
});
