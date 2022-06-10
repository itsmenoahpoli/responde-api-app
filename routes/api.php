<?php

use Illuminate\Support\Facades\Route;

/** Modules */
use App\Http\Controllers\API\SMSController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmergencySosController;
use App\Http\Controllers\API\EmergencySmsTemplatesController;
use App\Http\Controllers\API\EmergencyTypesController;
use App\Http\Controllers\API\UsersController;

Route::group(['prefix' => 'v1'], function() {
    // AUTH API
    Route::group(['prefix' => 'auth'], function() {
        Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
        Route::post('logout', [AuthController::class, 'logout'])->name('api.auth.logout')->middleware('auth:sanctum');
    });

    // MODULES
    Route::apiResources([
        'emergency-sos' => EmergencySosController::class,
        'emergency-sms-templates' => EmergencySmsTemplatesController::class,
        'emergency-types' => EmergencyTypesController::class,
        'users' => UsersController::class
    ]);
});
