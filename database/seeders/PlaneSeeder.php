<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Airbus A330-300', 'total_seat'=>100]
        );

        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Boeing 777-300ER', 'total_seat'=>110]
        );

        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Boeing 737-800', 'total_seat'=>180]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Airbus A330-200', 'total_seat'=>100]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Boeing 737 Max 8', 'total_seat'=>135]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Boeing 737-800NG', 'total_seat'=>150]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'CRJ1000 NextGen', 'total_seat'=>120]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'ATR 72-600', 'total_seat'=>130]
        );
        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Airbus A320neo', 'total_seat'=>100]
        );

        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Airbus A330-900neo', 'total_seat'=>140]
        );

        DB::table('planes')->insert(
            ['airline_id'=>1, 'model'=>'Boeing 737-900', 'total_seat'=>180]
        );

    }
}
