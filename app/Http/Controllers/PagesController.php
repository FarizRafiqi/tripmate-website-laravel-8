<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;
use App\Models\Airport;
use App\Models\Flight;

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
    public function show($id)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {
				// Ambil nama bandara dan kode dari inputan
        $bandaraasal = rtrim(preg_replace("/\([^)]+\)/","",$request->bandara_asal), " ");
				$bandaratujuan = rtrim(preg_replace("/\([^)]+\)/","",$request->bandara_tujuan), " ");
				
				preg_match('#\((.*?)\)#', $request->bandara_asal, $kode_bandara_asal);
				preg_match('#\((.*?)\)#', $request->bandara_tujuan, $kode_bandara_tujuan);
				
				if(!empty($kode_bandara_asal) && !empty($kode_bandara_tujuan)){
					$kode_bandara_asal = $kode_bandara_asal[1];
					$kode_bandara_tujuan = $kode_bandara_tujuan[1];
				}

        // validasi input halaman homepage
        $request->validate([
            'trip'              => 'required',
            'bandara_asal' => 'required',
            'bandara_tujuan'=> 'required|different:bandara_asal',
            'tanggal_berangkat' => 'required|date|after_or_equal:'.Carbon::now()->format('D, d M Y'),
            'tanggal_pulang'    => 'date|different:tanggal_berangkat|after:tanggal_berangkat',
            'dewasa'            => 'required|numeric',
            'anak'              => 'required|numeric',
            'bayi'              => 'required|numeric',
            ],
            [
                'bandara_asal.required' => ':attribute tidak boleh kosong',
                'bandara_tujuan.required' => ':attribute tidak boleh kosong',
                'bandara_tujuan.different' => 'Bandara asal dan tujuan harus berbeda',
                'tanggal_berangkat.required' => ':attribute tidak boleh kosong',
                'tanggal_berangkat.date' => ':attribute tidak valid'
            ]
				);

				// jumlahkan semua penumpang yang dipesan, lalu kirim ke view search
				$totalpenumpang = $request->dewasa + $request->anak + $request->bayi; 

				// $data akan menampung data hasil inner join antara tabel flights dan airports berdasarkan request user
        $result = Flight::select('flights.*', 'ba.kode_iata AS kode_bandara_asal', 'ba.nama AS bandara_asal', 'bt.kode_iata AS kode_bandara_tujuan', 'bt.nama AS bandara_tujuan')
											->join('airports AS ba', 'flights.id_bandara_asal', '=', 'ba.id')
											->join('airports AS bt', 'flights.id_bandara_tujuan', '=', 'bt.id')
											->where('ba.nama', 'like', '%'.$bandaraasal.'%')
											->where('bt.nama', 'like', '%'.$bandaratujuan.'%')
											->whereDate('flights.waktu_berangkat', Carbon::create($request->tanggal_berangkat))
											->get();

				// ubah format tanggal supaya menyesuaikan dengan di tabel flights
				$wb = Carbon::create($result[0]->waktu_berangkat);
				$wt = Carbon::create($result[0]->waktu_tiba);
				$durasipenerbangan = $wt->diffAsCarbonInterval($wb);
				
				return view("web.frontend.plane.search", compact('result', 'request', 'totalpenumpang', 'kode_bandara_asal', 'kode_bandara_tujuan', 'durasipenerbangan'));
    }
}
