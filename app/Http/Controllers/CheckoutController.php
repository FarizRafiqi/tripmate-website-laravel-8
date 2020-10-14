<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\FlightOrder;
use App\Models\FlightOrderDetail;
use App\Models\Passenger;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{   
    /**
     * Method ini digunakan untuk menampilkan halaman checkout, detail
     * penerbangan, dan total harga yang harus dibayarkan pada saat 
     * di halaman checkout
     */
    public function index(Request $request, $flightid1, $adult = 1, $child, $infant, $cabinclass, $flightid2 = null)
    {     
        $departureflight = Flight::with(['details', 'facilities', 'fromAirport', 'toAirport'])->where('id', $flightid1)->firstOrFail();

        if($request->adult == 0 || $request->adult < 0){
            $request->adult = $adult;
        }
        
        /**
         * Cek apakah pelanggan memesan tiket pulang, jika benar maka carikan
         * detail penerbangan pulang lalu hitung total harganya
         */
        if($flightid2 !=null ) {

            // Cari penerbangan pulang
            $arrivalflight = Flight::with(['details', 'facilities', 'fromAirport', 'toAirport'])->where('id', $flightid2)->firstOrFail();

            // hitung subtotal masing-masing penerbangan
            $pricefirstflight = $departureflight->details->first()->harga;
            $pricesecondflight = $arrivalflight->details->first()->harga;

            // Masukkan ke dalam array pricedetail
            $pricedetails = [
                'departure_flight' => [
                    'adult_price' => $pricefirstflight*$adult,
                    'child_price' => $pricefirstflight*$child,
                    'infant_price' => $pricefirstflight*$infant,
                ],
                'arrival_flight' => [
                    'adult_price' => $pricesecondflight*$adult,
                    'child_price' => $pricesecondflight*$child,
                    'infant_price' => $pricesecondflight*$infant,
                ]
            ];

            // Jumlahkan keseluruhan harganya
            $subtotal1 = $pricedetails['departure_flight']['adult_price']+$pricedetails['departure_flight']['child_price']+$pricedetails['departure_flight']['infant_price'];

            $subtotal2 = $pricedetails['arrival_flight']['adult_price']+$pricedetails['arrival_flight']['child_price']+$pricedetails['arrival_flight']['infant_price'];

            $totalprice = $subtotal1 + $subtotal2;

            return view('web.frontend.transaction.checkout', compact('departureflight', 'arrivalflight','request', 'totalprice', 'pricedetails'));

            // Jika pelanggan tidak memesan tiket penerbangan pulang, maka hitung total harganya saja
        }else{

            $pricefirstflight = $departureflight->details->first()->harga;

            $pricedetails = [
                'departure_flight' => [
                    'adult_price' => $pricefirstflight*$adult,
                    'child_price' => $pricefirstflight*$child,
                    'infant_price' => $pricefirstflight*$infant,
                ]
            ];

            $subtotal = $pricedetails['departure_flight']['adult_price']+$pricedetails['departure_flight']['child_price']+$pricedetails['departure_flight']['infant_price'];

            $totalprice = $subtotal;

            return view('web.frontend.transaction.checkout', compact('departureflight', 'request', 'pricedetails', 'totalprice'));
        }   
    }

    /**
     * Method ini digunakan untuk memvalidasi inputan pelanggan,
     * pada saat mengisikan detail pemesan dan detail 
     * penumpang
     */
    public function process(CheckoutRequest $request, $id)
    {   
   
        $validated = $request->validated();
    
        //Ambil data penerbangan sesuai dengan idnya
        $flight = Flight::where('id', $id)->firstOrFail();
 
        //simpan data penumpang , lalu masukkan ke dalam variabel
        $data = [];
        foreach($validated['title_penumpang'] as $item){
            $data = ['title'=>$item];
        }
        
        foreach($validated['nama_penumpang'] as $item){
            $data = ['nama_lengkap' => $item];
        }
        
        $passenger = Passenger::create($data);
       
        $flightorder = FlightOrder::create([
            'id' => 'FO'.rand(000,999),
            'id_pelanggan' => Auth::user()->id,
            'status' => 'IN_CART'
        ]);
        
        $flight_order_detail = FlightOrderDetail::create([
            'id_pemesanan' => $flightorder->id,
            'id_penerbangan' => $flight->id,
            'id_penumpang' => $passenger->id,
            'id_kursi' => null,
        ]);
        
        return view('web.frontend.transaction.payment', compact('flight_order_detail'));
    }

    public function create(Request $request, $id)
    {
       
    }

    public function remove(Request $request, $id)
    {

    }

    /**
     * Method ini digunakan untuk menampilkan halaman pembayaran
     * ketika pelanggan telah mengisikan detail pemesanan
     */
    public function success(Request $request, $id)
    {

    }

    /**
     * Method ini digunakan untuk merequest detail penerbangan
     * pada saat pelanggan mengklik tombol detail
     * penerbangan di halaman checkout
     */
    public function getFlightDetail(Request $request)
    {
        $flight = Flight::with(['facilities', 'fromAirport', 'toAirport', 'plane.airline'])->where('id', $request->id)
                    ->firstOrFail();
        return response()->json(['success' => 'data sukses dikirim', 'flight'=>$flight]);
    }
}
