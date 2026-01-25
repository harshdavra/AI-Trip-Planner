<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

Route::get('/', [TripController::class, 'index'])->name('home');

Route::get('/create-trip',[TripController::class,'create'])->name('create.trip');
Route::view('/itinerary-design', 'itinerary');
Route::post('/generate-itinerary', [TripController::class, 'showItinerary'])->name('itinerary.post');
Route::get('/view-itinerary', [TripController::class, 'showDesign'])->name('itinerary.design'); 