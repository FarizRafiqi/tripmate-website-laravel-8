<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert(
            ['name'=>'Bagasi', 'icon'=>'fas fa-suitcase']
        );

        DB::table('facilities')->insert(
            ['name'=>'Makanan', 'icon'=>'fas fa-utensils']
        );

        DB::table('facilities')->insert(
            ['name'=>'Hiburan', 'icon'=>'fas fa-photo-video'],
        );
    }
}
