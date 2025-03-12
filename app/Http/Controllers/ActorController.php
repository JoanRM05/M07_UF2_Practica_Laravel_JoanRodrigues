<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller{

    public function listActors(){

        $title = "";
        $actors =  DB::table("actors")->get();


        return view('actors.list', ["actors" => $actors, "title" => $title]);

    } 

}