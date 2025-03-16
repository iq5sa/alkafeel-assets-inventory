<?php

use Illuminate\Support\Facades\Route;




Route::post('/asset/add', [\App\Http\Controllers\AssetsController::class,"store"]);
