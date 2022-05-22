<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

Route::get('/', function () {
    $diff = Carbon::parse(Carbon::now()) - Carbon::parse(Carbon::now());

    return $diff;
});
