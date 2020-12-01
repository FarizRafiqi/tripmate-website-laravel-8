<?php

namespace App\Http\Controllers\Plane;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightSearch;
use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\City;

use function PHPUnit\Framework\isEmpty;

/**
 * Modul ini digunakan untuk menampilkan halaman homepage,
 * mencarikan penerbangan, mengubah pencarian penerbangan,
 * dan melanjutkan pencarian penerbangan apabila pelanggan
 * memilih perjalanan pulang-pergi
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class SearchController extends Controller
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
        session()->forget('order_id');
        //cari bandara penerbangan
        $fromairport = Airport::with(['flightFrom'])->firstWhere('iata_code', $request->origin);
        $toairport = Airport::with(['flightTo'])->firstWhere('iata_code', $request->destination);

        //Cek apakah kota bandara asal dan tujuan sama
        if($fromairport->city->id == $toairport->city->id) {
            return back()->with('error_message', 'Kota bandara tujuan harus berbeda');
        }
        /**
         * Cek apakah ada tanggal pulang, jika tidak ada maka set tripnya menjadi oneway
         * Note: hal ini dilakukan untuk form yang tidak memiliki radio button
         */
        if(!isset($request->arrival_date)){
            $request['trip'] = "oneway";
        }
        
        // Cek apakah pelanggan memesan tiket penerbangan pulang-pergi
        if($request->ajax()){
            $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                        ->search($request->arrival_date, $toairport, $fromairport, $request->class)->get();
            $request['flight_type'] = 'return';
        }else{
            $flights = Flight::with(['plane', 'fromAirport', 'toAirport', 'details', 'facilities'])
                        ->search($request->departure_date, $fromairport, $toairport, $request->class)->get();
            $request['flight_type'] = 'departure';
        }
        //Hitung harga setiap tiket penerbangan
        $fares = $this->calculateFares($flights, $request);
        $cities = City::with('airports')->get();
        $airports = Airport::with(['flightTo', 'flightFrom'])->get();
        $originairport = Airport::where('iata_code', $request->origin)->value('name');
        $destinationairport = Airport::where('iata_code', $request->destination)->value('name');

        //Simpan data-data pencarian ke dalam cookies, supaya meningkatkan kenyamanan pelanggan
        $expired = time() + (86400*30); //waktu expired-nya 1 bulan
        $lastsearch = $request->only('trip', 'origin', 'destination', 'departure_date', 'arrival_date', 'adult', 'child', 'infant', 'class');
        foreach($lastsearch as $key=>$item){
            setcookie($key, $item, $expired, "/");
            session()->put($key, $item);
        }
        
        $returnview = view("web.frontend.plane.flight-search", compact("flights", "request", "cities", "airports", "fares", "originairport", "destinationairport"));
        
        return ($request->ajax()) ? response()->json(['success_message'=>"pencarian sukses", 'html'=>$returnview->render()]) : $returnview;
    }

    public function calculateFares($flights, Request $request)
    {
        //Iuran Wajib Jasa Raharja (IWJR) yang ditetapkan pemerintah
        $assurance = 5000;
        $fares = [];
        foreach($flights as $flight){
            foreach($flight->fares()->get() as $fare){
                //Hitung PPN untuk setiap tarif dasar penerbangan
                $tax = $fare->getFare()*10/100;
                //Hitung subtotal harga dari tiap penumpang
                $adultfare      = $fare->getFare()*$request->adult;
                $childfare      = $fare->getFare('anak')*$request->child;
                $infantfare     = $fare->getFare('bayi')*$request->infant;
                $airporttax     = 0;
                $fuelsurcharge  = 0;
    
                //Masukkan harga yang sudah dihitung sebelumnya ke dalam array fare
                $fares[] = [
                    'adultfare'     => $adultfare,
                    'childfare'     => $childfare,
                    'infantfare'    => $infantfare,
                    'tax'           => $tax,
                    'assurance'     => $assurance,
                    'airporttax'    => $airporttax,
                    'fuelsurcharge' => $fuelsurcharge,
                    'totalfare'     => $adultfare+$childfare+$infantfare+$tax+$assurance
                ];
            }
        }

        return $fares;
    }
}
