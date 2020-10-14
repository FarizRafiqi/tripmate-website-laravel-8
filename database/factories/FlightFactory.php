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
            'id_pesawat' => function(array $attributes){
                return Plane::find($attributes['id'])->id;
            },
            'id_bandara_asal' => function(array $attributes){
                return Airport::find($attributes['id'])->id;
            },
            'id_bandara_tujuan' => function(array $attributes){
                return Airport::find($attributes['id'])->id;
            },
            'durasi' => null,
            'waktu_berangkat' => Carbon::now(),
            'waktu_tiba' => Carbon::now()->add(rand(0, 23), 'hours')->add(rand(0,60), 'minutes'),
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
        ];
    }
}
