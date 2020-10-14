<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Seeder;
use App\Models\Plane;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $waktuberangkat = Carbon::now();
       $waktupulang = Carbon::now()->add(rand(0, 23), 'hours')->add(rand(0,60), 'minutes');
       $durasi = Carbon::parse($waktupulang->diffAsCarbonInterval($waktuberangkat));

       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
       DB::table('flights')->insert([
            'id' => Str::random(2).'-'.rand(0,9999),
            'id_pesawat' => Plane::find(rand(1,2))["id"],
            'id_bandara_asal' => Airport::find(2)["id"],
            'id_bandara_tujuan' => Airport::find(3)["id"],
            'durasi' => $durasi,
            'waktu_berangkat' => $waktuberangkat,
            'waktu_tiba' => $waktupulang,
            'kecepatan_rata_rata' => rand(400, 600),
            'jarak_perjalanan' => rand(300, 600)
       ]);
    }
}
