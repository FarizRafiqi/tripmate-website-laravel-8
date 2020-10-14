<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearch;
use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\City;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('airports')->get();
        return view('web.frontend.index', compact('cities'));
    }

    public function search(FlightSearch $request) {
        // validasi input halaman homepage
        $validated = $request->validated();

        $fromairport = Airport::where('kode_iata', $validated['bandara_asal'])->first();
        $toairport = Airport::where('kode_iata', $validated['bandara_tujuan'])->first();
 
        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                    ->whereDate("waktu_berangkat", Carbon::create($request->tanggal_berangkat))
                    ->where('kelas', strtolower($request->kelas))
                    ->where('id_bandara_asal', $fromairport->id)
                    ->where('id_bandara_tujuan', $toairport->id)
                    ->get();
        
        $airports = Airport::all();

        return view("web.frontend.plane.search", compact("flights", "airports", "request"));
    }

    public function changeSearch(FlightSearch $request) {
        // validasi input halaman homepage
        $validated = $request->validated();

        $fromairport = Airport::where('kode_iata', $validated['bandara_asal'])->first();
        $toairport = Airport::where('kode_iata', $validated['bandara_tujuan'])->first();
 
        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                    ->whereDate("waktu_berangkat", Carbon::create($request->tanggal_berangkat))
                    ->where('kelas', strtolower($request->kelas))
                    ->where('id_bandara_asal', $fromairport->id)
                    ->where('id_bandara_tujuan', $toairport->id)
                    ->get();
        
        $cities = City::with('airports')->get();
        $airports = Airport::all();
        $request = $request->all();

        return view("web.frontend.plane.search", compact("flights", "airports", "request", "cities"));
    }

    public function nextSearch(Request $request) {
        // dd($request->all());
        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])->whereDate("waktu_berangkat", Carbon::create($request->tanggal_pulang))->where('kelas', strtolower($request->kelas))->get();
        
        // Cek apakah ada penerbangan pulang
        foreach($flights as $flight){
            /** 
             * Jika tidak ada maka isi penerbangan dengan array kosong, sehingga di halaman pencarian
             * akan otomatis menampilkan pesan "Penerbangan tidak tersedia"
             * */ 
            if($flight->fromAirport->kode_iata != $request->bandara_tujuan){
                $flights = [];
            }
        }

        $airports = Airport::all();
        return view("web.frontend.plane.search", compact("flights", "airports", "request"));
    }
}
