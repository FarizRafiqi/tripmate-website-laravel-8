<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Passenger::factory()->count(10)
                            ->state(new Sequence(
                                ['title' => 'tuan'],
                                ['title' => 'nyonya'],
                                ['title' => 'nona'],
                            ))->create();
    }
}
