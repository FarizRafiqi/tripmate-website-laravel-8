<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            ['name'=>'Jakarta', "province"=>'Daerah Khusus Ibukota Jakarta']
        );

        DB::table('cities')->insert(
            ['name'=>'Bandar Lampung', "province"=>'Lampung']
        );

        DB::table('cities')->insert(
            ['name'=>'Surabaya', "province"=>'Jawa Timur']
        );

        DB::table('cities')->insert(
            ['name'=>'Medan', "province"=>'Sumatra Utara']
        );

        DB::table('cities')->insert(
            ['name'=>'Makassar', "province"=>'Sumatra Utara']
        );

        DB::table('cities')->insert(
            ['name'=>'Yogyakarta', "province"=>'Daerah Istimewa Yogyakarta']
        );

        DB::table('cities')->insert(
            ['name'=>'Denpasar-Bali', "province"=>'Bali']
        );

        DB::table('cities')->insert(
            ['name'=>'Padang', "province"=>'Sumatra Barat']
        );

        DB::table('cities')->insert(
            ['name'=>'Palembang', "province"=>'Sumatra Selatan']
        );
    }
}
