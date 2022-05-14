<?php

use Illuminate\Support\Facades\Route;

/** Modules */
use App\Http\Controllers\API\AuthController;

Route::group(['prefix' => 'v1'], function() {
    Route::prefix('auth')->group(function() {
        Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
    });
});
