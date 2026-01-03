<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-trip',[TripController::class,'create'])
    ->name('create.trip');
