<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $films = Film::all();
        $actors = Actor::all();

        if ($films->isEmpty() || $actors->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $film = $films->random();
            $actor = $actors->random();

            if (!$film->Actors()->where('actor_id', $actor->id)->exists()) {
                $film->Actors()->attach($actor->id);
            }
        }

        /* $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        if (empty($filmIds) || empty($actorIds)){
            return;
        }

        for ($i=0; $i < 10; $i++) { 
            
            DB::table("actor_film")->insert([
                'film_id' => $filmIds[array_rand($filmIds)],
                'actor_id' => $actorIds[array_rand($actorIds)],
                'created_at' => now(),
                'updated_at' => now()
            ]);

        } */
    }
}
