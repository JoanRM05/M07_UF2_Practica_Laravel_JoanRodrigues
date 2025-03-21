<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller{

    public function listActors(){

        $title = "Lista de Actores";
        $actors =  DB::table("actors")->get()->toArray();

        $actorsArray = array_map(function ($actor) {
            return (array) $actor;
        }, $actors);

        return view('actors.list', ["actors" => $actorsArray, "title" => $title]);

    } 

    public function countActors(){

        $title = "Contador de Actores";
        $actors =  DB::table("actors")->count();

        return view('actors.count', ["count" => $actors, "title" => $title]);
    }

    public function listActorsByDecade (Request $request){

        $title = "Lista de Actores por Decada";
        $year = $request->input('year');

        $startYear = $year . '-01-01';
        $endYear = $year + 9 . '-12-31';

        $actors =  DB::table("actors")->whereBetween('birthdate', [$startYear, $endYear])->get()->toArray();
        
        $actorsArray = array_map(function ($actor) {
            return (array) $actor;
        }, $actors);

        return view('actors.list', ["actors" => $actorsArray, "title" => $title]);

    }

    public function destroy($id){
        $result = DB::table('actors')->where('id', '=', $id)->delete();
        return response()->json(['action' => 'delete', 'status' => $result == 1 ? 'true' : 'false']);
    }   


}