<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Actor::factory()->count(10)->create();

        /* $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table("actors")->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->date(),
                'country' => $faker->country(),
                'img_url' => $faker->imageUrl(60, 60, 'actors'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } */
    }
}
