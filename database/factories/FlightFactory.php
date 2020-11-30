<?php

namespace Database\Factories;

use App\Models\Airport;
use App\Models\Model;
use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::random(2).'-'.rand(0,9999),
            'plane_id' => Plane::factory(),
            'origin_airport_id' => Airport::factory(),
            'arrival_airport_id' => Airport::factory(),
            'departure_time' => now(),
            'arrival_time' => now()->add(rand(0, 23), 'hours')->add(rand(0,60), 'minutes'),
            'velocity_avg' => rand(400, 600),
            'trip_distance' => rand(300, 600)
        ];
    }
}
