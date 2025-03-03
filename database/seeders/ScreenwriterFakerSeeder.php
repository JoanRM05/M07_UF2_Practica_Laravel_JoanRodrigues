<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ScreenwriterFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            
            DB::table("screenwriters")->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->date(),
                'country' => $faker->country(),
                'img_url' => $faker->imageUrl(60, 60, 'screenwriters'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }
    }
}
