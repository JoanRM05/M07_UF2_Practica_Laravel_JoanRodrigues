<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('/actors/{id?}', [ActorController::class, 'destroy']);

Route::patch('/actors/{id}', [ActorController::class, 'update']);

Route::get('/actors', [ActorController::class, 'index']);

/* Route::get('/films', [FilmController::class, 'index']); */

Route::get('/films', [FilmController::class, 'index']);

