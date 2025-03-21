<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films',[FilmController::class, "listFilms"])->name('listFilms');
        Route::get('filmsGenre/{genre?}', [FilmController::class, "listFilmsByGenre"])->name('listFilmsByGenre');
        Route::get('filmsYear/{year?}', [FilmController::class, "listFilmsByYear"])->name('listFilmsByYear');
        Route::get('sortFilms', [FilmController::class, "sortFilmsByYear"])->name('sortFilmsByYear');
        Route::get('countFilms', [FilmController::class, "countAllFilms"])->name('countAllFilms');
        
       
    });
});

Route::middleware('url')->group(function() {
    Route::group(['prefix' => 'filmin'], function() {
        Route::post('createFilm', [FilmController::class, "createFilm"])->name('createFilm');
    });
});

Route::group(['prefix' => 'actorout'], function() {
    Route::get('actors', [ActorController::class, "listActors"])->name('listActors');
    Route::get('countActors', [ActorController::class, "countActors"])->name('countActors');
    Route::get('listactorsByDecade', [ActorController::class, "listActorsByDecade"])->name('listActorsByDecade');
});