<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearch;
use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\City;

/**
 * Modul ini digunakan untuk menampilkan halaman homepage,
 * mencarikan penerbangan, mengubah pencarian penerbangan,
 * dan melanjutkan pencarian penerbangan apabila pelanggan
 * memilih perjalanan pulang-pergi
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class PagesController extends Controller
{
    /**
     * Method ini digunakan untuk menampilkan halaman homepage
     * dan mengirimkan data-data bandara ke view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('airports')->get();
        return view('web.frontend.index', compact('cities'));
    }

    /**
     * Method ini digunakan untuk mencarikan penerbangan berdasarkan
     * request yang diterima dari pelanggan, melakukan validasi terhadap
     * inputan pelanggan, dan mengirimkan data-data bandara serta kota
     * ke view pencarian
     */
    public function search(FlightSearch $request) {
        $flights = $this->searchFlight($request);
        if($request->session()->has('error_message')){
            return back();
        }
        /**
         * Ambil semua model kota yang memiliki relasi dengan model bandara, 
         * lalu kembalikan hasilnya dalam bentuk collection
         */ 
        $cities = City::with('airports')->get();
        $airports = Airport::with(['flightTo', 'flightFrom'])->get();

        return view("web.frontend.plane.search", compact("flights", "request", "cities", "airports"));
    }

    /**
     * Method ini digunakan untuk mengubah pencarian Penerbangan
     * di halaman search
     */
    public function changeSearch(FlightSearch $request) {
        $flights = $this->searchFlight($request);
        if($request->session()->has('error_message')){
            return back();
        }
        /**
         * Ambil semua model kota yang memiliki relasi dengan model bandara, 
         * lalu kembalikan hasilnya dalam bentuk collection
         */ 
        $cities = City::with('airports')->get();
        $request = $request->all();
        $airports = Airport::with(['flightTo', 'flightFrom'])->get();
        return view("web.frontend.plane.search", compact("flights", "request", "cities", "airports"));
    }

    /**
     * Method ini digunakan untuk melanjutkan pencarian penerbangan
     * apabila penerbangan yang dipilih adalah pulang-pergi
     */
    public function nextSearch(Request $request) {
        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                    ->whereDate("waktu_berangkat", Carbon::create($request->tanggal_pulang))
                    ->where('kelas', strtolower($request->kelas))
                    ->get();
        
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
        $cities = City::with('airports')->get();
        $airports = Airport::with(['flightTo', 'flightFrom'])->get();
        return view("web.frontend.plane.search", compact("flights", "request", "cities", "airports"));
    }

    public function searchFlight($request)
    {
        // validasi input halaman homepage
        $request->validated();

        $fromairport = Airport::with(['flightFrom'])->firstWhere('kode_iata', $request->bandara_asal);
        $toairport = Airport::with(['flightTo'])->firstWhere('kode_iata', $request->bandara_tujuan);
        
        //Cek apakah kota bandara asal dan tujuan sama
        if($fromairport->city->id == $toairport->city->id) {
            return back()->with('error_message', 'Kota bandara tujuan harus berbeda');
        }
        // Cari penerbangan dengan tanggal berangkat dan kelas tertentu
        $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                    ->whereDate("waktu_berangkat", Carbon::create($request->tanggal_berangkat))
                    ->where('kelas', strtolower($request->kelas))
                    ->where('id_bandara_asal', $fromairport->id)
                    ->where('id_bandara_tujuan', $toairport->id)
                    ->get();
        return $flights;
    }
}
