<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            AirlineSeeder::class,
            AirportSeeder::class,
            FacilitySeeder::class,
            PlaneSeeder::class,
            UserRoleSeeder::class,
            UserSeeder::class,
            PassengerSeeder::class,
            FlightSeeder::class
        ]);
    }
}
