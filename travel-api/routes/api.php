<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\AttractionController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::middleware('auth:api')->group(function () {
    Route::get('/countries', [CountryController::class, 'index']);
    Route::get('/destinations', [DestinationController::class, 'index']);
    Route::get('/tours', [TourController::class, 'index']);
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::get('/attractions', [AttractionController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);
});

