<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/asset/add', [\App\Http\Controllers\AssetsController::class,"store"]);
