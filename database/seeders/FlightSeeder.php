<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tomorrow = date('Y-m-d H:i:s', strtotime(today().'+1 day'));
        DB::table('flights')->insert(
            [
                'id' => 'GA-1231',
                'plane_id' => 1,
                'departure_airport_id' => 1,
                'arrival_airport_id' => 4,
                'departure_time' => today(),
                'arrival_time' => date('Y-m-d H:i:s', strtotime(today().'+1 hour')),
                'velocity_avg' => 500,
                'trip_distance' => 455,
                'class'         => 'ekonomi'
            ]
        );
        DB::table('flights')->insert(
            [
                'id' => 'GA-1232',
                'plane_id' => 1,
                'departure_airport_id' => 4,
                'arrival_airport_id' => 1,
                'departure_time' => $tomorrow,
                'arrival_time' => date('Y-m-d H:i:s', strtotime($tomorrow.'+1 hour')),
                'velocity_avg' => 500,
                'trip_distance' => 455,
                'class'         => 'ekonomi'
            ]
        );
    }
}
