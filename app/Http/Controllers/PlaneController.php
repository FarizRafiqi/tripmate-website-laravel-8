<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\FlightOrder;
use App\Models\FlightOrderDetail;
use App\Models\City;

/**
 * Modul ini digunakan untuk menampilkan halaman pesawat
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class PlaneController extends Controller
{
    /**
     * Menampilkan halaman pesawat
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::with('airports')->get();
        // Cek apakah user sudah login, jika iya maka dapatkan pencarian penerbangan terakhir yang dibuat user tersebut
        if($request->user() != null){
            $flightorders = FlightOrder::where('user_id', Auth::user()->id)->get();
            return view('web.frontend.plane.index', compact('cities', 'flightorders'));
        }else{
            return view('web.frontend.plane.index', compact('cities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Hapus semua peme
     *
     * @param  FlightOrder  $flightorderid
     * @return \Illuminate\Http\Response
     */
    public function deleteLastSearch(FlightOrder $flightorderid)
    {
        //
    }
}
