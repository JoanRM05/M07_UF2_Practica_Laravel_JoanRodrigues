<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmScreenwriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $screenwriterIds = DB::table('screenwriters')->pluck('id')->toArray();

        if (empty($filmIds) || empty($screenwriterIds)){
            return;
        }

        for ($i=0; $i < 10; $i++) { 
            
            DB::table("films_screenwriters")->insert([
                'film_id' => $filmIds[array_rand($filmIds)],
                'screenwriter_id' => $screenwriterIds[array_rand($screenwriterIds)],
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
    }
}
