<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Satellite;

class SatelliteFactory extends Factory
{
    protected $model = Satellite::class;

    public function definition()
    {
        static $number = 1;

        return [
            'name' => $this->faker->word(),
            'photo' => 'img/satelite' . $number++ . '.jpg',
        ];
    }
}