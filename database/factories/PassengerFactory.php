<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'date_of_birth' => $this->faker->date(),
        ];
    }
}
