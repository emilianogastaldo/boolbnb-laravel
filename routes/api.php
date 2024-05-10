<?php

use App\Http\Controllers\Api\FlatController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotte api per la home e per la show
Route::get('/flats', [FlatController::class, 'index']);

// Rotta per la show degli appartamenti
Route::get('/flats/{slug}', [FlatController::class, 'show']);

// Rotta per l'invio di email
Route::post('/contact-mail', [MailController::class, 'store']);

// rotta per scollegarsi
Route::get('logout/', [AuthController::class, 'logout']);
