<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array {
        $films = Storage::json('/public/films.json');
        $dbfilms =  DB::table("films")->get()->toArray();

        $filmsarray = array_map(function ($film) {
            return (array) $film;
        }, $dbfilms);

        $totalFilms = array_merge($films, $filmsarray);

        return $totalFilms;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {        
        $old_films = [];
        if (is_null($year))
        $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $films = FilmController::readFilms();

        foreach ($films as $film) {
        //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas.
     */
    public function listFilms()
    {

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        return view("films.list", ["films" => $films, "title" => $title]);
        
    }

    /**
     * Lista las películas de X genero.
     */

     public function listFilmsByGenre($genre = null)
     {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on genre informed
        foreach ($films as $film) {
            if((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)){
                $title = "Listado de todas las pelis filtrado " .$genre. " categoria";
                $films_filtered[] = $film;
            }
        }

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
     }


     /**
     * Lista las películas de X año.
     */

     public function listFilmsByYear($year = null){
        
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year are null
        if (is_null($year) )
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year informed
        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year){
                $title = "Listado de todas las pelis filtrado " .$year. " año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
     }

     /**
     * Lista las películas por año de manera descendente.
     */

     public function sortFilmsByYear(){

        $title = "Listado de todas las pelis ordenadas de manera descendente (Por Año)";
        $films = FilmController::readFilms();

        $films_sorted = collect($films)->sortByDesc('year');

        return view("films.list", ["films" => $films_sorted, "title" => $title]);
     }


     /**
     * Contar el numero total de películas. 
     */

     public function countAllFilms(){

        $title = "Contador de todas las peliculas almacenadas";
        $films = FilmController::readFilms();

        $films_counted = count($films);

        return view("films.count", ["count" => $films_counted, "title" => $title]);
     } 

     public function isFilm($name){

        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film['name'] === $name){
                return true;
            }
        }

        return false;

     }


     public function createFilm(Request $request){

        $title = "Pelicula Añadida";

        $nombre = $request->input('nombre');
        $año = $request->input('año');
        $genero = $request->input('genero');
        $pais = $request->input('pais');
        $duracion = $request->input('duracion');
        $url = $request->input('url');

        $new_film = ["name" => $nombre, "year" => (int)$año, "genre" => $genero, "country" => $pais, "duration" => (int)$duracion, "img_url" => $url];

        if ($this->isFilm($nombre)){
            return redirect('/')->withErrors(["error" => "El nombre introducido ya pertenece a una pelicula"]);
        }

        if(env('STORAGE') == "JSON"){

            $jsonString = file_get_contents('../storage/app/public/films.json');
            $data = json_decode($jsonString, true);
    
            array_push($data, $new_film);
    
            $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
            file_put_contents('../storage/app/public/films.json', $json);
    

        } else if (env('STORAGE') == "SQL"){

            DB::table('films')->insert($new_film);

        }

        $films = FilmController::readFilms();
    
        return view("films.list", ["films" => $films, "title" => $title]);


     }

     public function index(){

        $films = FilmController::readFilms();

        return response()->json(['films' => $films], 200, [], JSON_PRETTY_PRINT);

     }

}
