<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/destinations', [DestinationController::class, 'getAllDestination']);
Route::get('/destinations/{id}', [DestinationController::class, 'showDestinationbyId']);

// Protected Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/destinations/search/{name}', [DestinationController::class, 'searchDestination']);
    Route::post('/logout', [AuthController::class, 'logout']);
});