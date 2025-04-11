<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->year(),
            'genre' => $this->faker->randomElement(['Terror', 'Romance', 'Comedia', 'Rencuentro de la vida', 'Accion', 'Suspense', 'Thriller']),
            'country' => $this->faker->country(),
            'duration' => $this->faker->numberBetween(60, 240),
            'img_url' => $this->faker->imageUrl(60, 60, 'movies'),
        ];
    }
}
