<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

Route::get('/', function () {
    return Carbon::now()->format('h:i A F d, Y l');
});
