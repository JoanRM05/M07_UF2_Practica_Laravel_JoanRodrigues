<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Film::factory()->count(10)->create();

        /* $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table("films")->insert([
                'name' => $faker->firstName(),
                'year' => $faker->year(),
                'genre' => $faker->randomElement(['Terror', 'Romance', 'Comedia', 'Rencuentro de la vida', 'Accion', 'Suspense', 'Thriller']),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(60, 240),
                'img_url' =>  $faker->imageUrl(60, 60, 'movies'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } */
    }
}
