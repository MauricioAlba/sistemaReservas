<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/auth/user', function (Request $request) {
        return $request->user();
    });

    //AUTH
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/register', [AuthController::class, 'register']);
    
    //ENVIROMENTS
    Route::post('/environment', [EnvironmentController::class, 'store']);
    Route::get('/environment/{id}', [EnvironmentController::class, 'show']);
    Route::get('/environment', [EnvironmentController::class, 'index']);
    Route::delete('/environment/{id}', [EnvironmentController::class, 'destroy']);
    Route::put('/environment/{id}', [EnvironmentController::class, 'update']);
});


//RESERVATIONS
Route::controller(ReservationController::class)->group(function(){
    Route::get('/reservations/{userID}', 'reservationbyUserID');
    Route::get('/reservations/{environmentID}', 'reservationbyEnvironmentID');
    Route::get('/reservations', 'index');
});






Route::post('/auth/login', [AuthController::class, 'login']);
