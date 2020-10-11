<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearch;
use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Airport;
use App\Models\Airline;
use App\Models\Facility;
use App\Models\Flight;
use App\Models\FlightDetail;
use App\Models\Plane;
use DateTime;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bandara = Airport::all();
        return view('web.frontend.index', compact('bandara'));
    }

    public function search(FlightSearch $request) {
        // validasi input halaman homepage
        $validated = $request->validated();

        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])->whereDate("waktu_berangkat", Carbon::create($request->tanggal_berangkat))->where('kelas', strtolower($request->kelas))->get();
        // Jika 
        if($request->trip == "roundtrip" && isset($request->tanggal_pulang)) {
            $homeflights = Flight::where("waktu_berangkat", Carbon::create($request->tanggal_pulang))->get();
        }
        
        $airports = Airport::all();
        $request = $request->all();

        return view("web.frontend.plane.search", compact("flights", "airports", "request"));
    }

    public function changeSearch(FlightSearch $request) {
        // validasi input halaman homepage
        $validated = $request->validated();

        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])->whereDate("waktu_berangkat", Carbon::create($request->tanggal_berangkat))->where('kelas', strtolower($request->kelas))->get();

        // Jika 
        if($request->trip == "roundtrip" && isset($request->tanggal_pulang)) {
            $homeflights = Flight::where("waktu_berangkat", Carbon::create($request->tanggal_pulang))->get();
        }
        
        $airports = Airport::all();
        $request = $request->all();

        return view("web.frontend.plane.search", compact("flights", "airports", "request"));
    }
}
