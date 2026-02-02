<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

Route::match(['get','post'], '/', [TripController::class, 'index'])->name('home');
Route::get('/create-trip',[TripController::class,'create'])->name('create.trip');
Route::post('/generate-itinerary', [TripController::class, 'showItinerary'])->name('itinerary.post');
Route::get('/view-itinerary', [TripController::class, 'showDesign'])->name('itinerary.design'); 
Route::get('/api/autocomplete', [App\Http\Controllers\TripController::class, 'autocomplete']);