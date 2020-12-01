<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insertOrIgnore(
            ['iata_code'=>'CGK', 'name'=>'Soekarno Hatta', 'city_id'=>1]
        );

        DB::table('airports')->insert(
            ['iata_code'=>'HLP', 'name'=>'Halim Perdana Kusuma', 'city_id'=>1]
        );

        DB::table('airports')->insert(
            ['iata_code'=>'WYK', 'name'=>'Gatot Subroto', 'city_id'=>2]
        );

        DB::table('airports')->insert(
            ['iata_code'=>'TKG', 'name'=>'Raden Inten II', 'city_id'=>2],
        );

        DB::table('airports')->insert(
            ['iata_code'=>'JOG', 'name'=>'Adi Sutjipto', 'city_id'=>7],
        );

        DB::table('airports')->insert(
            ['iata_code'=>'YIA', 'name'=>'Yogyakarta Kulon Progo', 'city_id'=>7],
        );
    }
}
