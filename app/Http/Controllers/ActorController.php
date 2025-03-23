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

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'string|max:30',
            'surname' => 'string|max:30',
            'birthdate' => 'date',
            'country' => 'string|max:50',
            'img_url' => 'string|max:255'
        ]);

        if (empty($validated)) {
            return response()->json(['action' => 'update', 'status' => 'false']);
        }

        $data = array_merge($validated, ['updated_at' => now()]);

        $affected = DB::table('actors')->where('id', $id)->update($data);
        
        return response()->json(['action' => 'update', 'status' => $affected == 1 ? 'true' : 'false']);
    }

}