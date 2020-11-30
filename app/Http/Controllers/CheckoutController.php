<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\FlightDetail;
use App\Models\FlightOrder;
use App\Models\FlightOrderDetail;
use App\Models\Passenger;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Modul ini digunakan untuk menampilkan view checkout,
 * mengelola data pemesan, penumpang, maupun pemesanan
 * Serta untuk menampilkan detail pembayaran dan penerbangan.
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class CheckoutController extends Controller
{   
    /**
     * Method ini digunakan untuk menampilkan halaman checkout, detail
     * penerbangan, dan mengolah harga tiket yang harus dibayarkan
     */
    public function index(Request $request, $id)
    {     
        //Ambil detail pemesanan penerbangan dan penerbangan
        $flightorderdetails = FlightOrderDetail::with(['flight', 'flight.details'])->where('id_pemesanan', $id)->get();

        //Hitung harga tiket tiap penerbangan
        foreach($flightorderdetails as $item){
            $basicfare = $item->flight->details->first()->harga;
            
            //Iuran Wajib Jasa Raharja (IWJR) yang ditetapkan pemerintah
            $assurance = 5000;

            // Pajak Pertambah Nilai (PPN) sebesar 10% yang ditetapkan pemerintah
            $tax = $basicfare*10/100;

            //Harga tiket dewasa dan anak adalah sama, sedangkan harga tiket bayi adalah 10% dari harga tiket dewasa
            $adultfare = $childfare = $basicfare;
            $infantfare = $adultfare*10/100;

            //Hitung subtotal harga dari tiap penumpang
            $adultfare *= $request->session()->get('adult', 1);
            $childfare *= $request->session()->get('child', 0);
            $infantfare *= $request->session()->get('infant', 0);
            $airporttax = 0;
            $fuelsurcharge = 0;

            //Masukkan harga yang sudah dihitung sebelumnya ke dalam array fare
            $fares[] = [
                'adult' => $adultfare,
                'child' => $childfare,
                'infant' => $infantfare,
                'tax'   => $tax,
                'assurance' => $assurance,
                'airporttax' => $airporttax,
                'fuelsurcharge' => $fuelsurcharge,
                'totalfare' => $adultfare+$childfare+$infantfare+$tax+$assurance
            ];
        }
        
        $request->session()->reflash();
        $passenger = $request->session()->get('passenger');
        
        //Hitung batas pemesanan
        $flightorder = FlightOrder::find($id);
        $flightordertime = $flightorder->created_at;
        $ordertimelimit = $flightordertime->add(30, 'minutes')->format("Y/m/d H:i:s");

        return view('web.frontend.transaction.checkout', compact('passenger','flightorderdetails','fares', 'ordertimelimit'));
    }

    /**
     * Method ini digunakan untuk membuat pesanan pelanggan dan detailnya,
     * kemudian data tersebut dikirim ke halaman checkout
     */
    public function process(Request $request, Flight $departureid, Flight $arrivalid = null)
    { 
        /**
         * Setiap pelanggan yang melakukan pemesanan penerbangan 
         * akan dicatat datanya dalam tabel flightorders,
         * dengan mengambil id dari user yang sudah login
         * dan mengatur status pemesanannya menjadi IN_CART.
         * IN_CART berarti pemesanan penerbangan pelanggan
         * masih di dalam keranjang. Status pemesanan ini menyatakan bahwa
         * pemesanan pelanggan ini mempunyai dua kemungkinan, yaitu apakah
         * pemesanan ini akan dibayar atau dibatalkan
         */

        $totalpassenger = $request->adult+$request->child+$request->infant;
        $flightorder = FlightOrder::create([
            'id' => uniqid("FO"),
            'id_pelanggan' => Auth::user()->id,
            'jumlah_penumpang' => $totalpassenger,
            'status' => 'IN_CART'
        ]);
        
        if($arrivalid != null){
            $flightorder->flightOrderDetails()->createMany([
                ['id_penerbangan' => $departureid->id],
                ['id_penerbangan' => $arrivalid->id]
            ]);
        }else{
            FlightOrderDetail::create(['id_pemesanan'=>$flightorder->id,'id_penerbangan' => $departureid->id]);
        }
      
        $departuredate = date("Y-m-d", strtotime($request->departure_date));
        $arrivaldate = date("Y-m-d", strtotime($request->arrival_date));
        return redirect()->route('checkout', [
            'id'=>$flightorder->id, 
            'origin'        => $request->origin, 
            'destination'   => $request->destination,
            'departure_date'=> $departuredate,
            'arrival_date'  => $arrivaldate,
            'adult'         => $request->adult,
            'child'         => $request->child,
            'infant'        => $request->infant,
            'class'         => $request->class
            ]
        )->with('passenger', $request->except('origin', 'destination', 'departure_date', 'arrival_date', 'class'));
    }

    /**
     * Method ini digunakan untuk membuat data pemesanan berikut detailnya, dan penumpang,
     * kemudian data-data tersebut dikirim ke halaman pembayaran
     */
    public function create(CheckoutRequest $request, $id)
    {
       /**
         * Ambil data penumpang, seperti title dan namanya
         * karena data-data tersebut di kumpulkan jadi satu array, 
         * maka data tersebut perlu di looping kemudian dimasukkan ke
         * dalam array baru dengan key yang sesuai dengan yang ada di 
         * database
         */
        $validated = $request->validated();
        $data = [];
        foreach($validated['title_penumpang'] as $key=>$title){
            $data[$key] =  ['title'=>$title, 'nama_lengkap' => $validated['nama_penumpang'][$key]];
        }
        
        //Masukkan data penumpang tersebut ke dalam tabel passengers
        Passenger::insert($data);
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
        $flight = Flight::with(['facilities', 'fromAirport.city', 'toAirport.city', 'plane.airline'])->where('id', $request->id)->firstOrFail();

        return response()->json(['success' => 'data sukses dikirim', 'flight'=>$flight]);
    }
}
