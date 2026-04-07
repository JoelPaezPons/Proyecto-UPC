<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Satellites;

class SatellitesFactory extends Factory
{
    protected $model = Satellites::class; 
    public function definition(): array
    {
        return [
            'name' => 'Sat-' . $this->faker->lexify('???') . '-' . $this->faker->numerify('##'),
            'norad_id' => $this->faker->unique()->numerify('#####'),
            'altitude' => $this->faker->numberBetween(400, 35000), // Desde LEO hasta GEO
            'velocity' => $this->faker->numberBetween(7000, 28000),
            'battery' => $this->faker->numberBetween(15, 100),
            'status' => $this->faker->randomElement(['Operativo', 'Mantenimiento']),
            'mode' => $this->faker->randomElement(['Standby', 'Científico', 'Maniobra']),
            'anomalies_count' => 0,
        ];
    }
}

