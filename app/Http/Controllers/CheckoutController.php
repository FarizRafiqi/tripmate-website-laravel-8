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
        dd($request);
        //Ambil detail pemesanan penerbangan dan penerbangan
        $flightorderdetail = FlightOrderDetail::where('id_pemesanan', $id)->firstOrFail();
        $flightdetails = FlightDetail::where('id_penerbangan', $flightorderdetail->id_penerbangan)->get();
        
        $basicfare = $flightdetails->first()->harga;
        $tax = $basicfare*10/100;
        $assurance = 5000;

        $adultfare = $childfare = $basicfare;
        $infantfare = $adultfare*10/100;
        $fare = [
            'adult' => $adultfare,
            'infant' => $childfare,
            'adult' => $infantfare,
            'tax'   => $tax,
            'assurance' => $assurance,
        ];
        return view('web.frontend.transaction.checkout', compact('request'));
    }

    /**
     * Method ini digunakan untuk memvalidasi inputan pelanggan,
     * pada saat mengisikan detail pemesan dan detail 
     * penumpang
     */
    public function process(Request $request, Flight $departureid, Flight $arrivalid = null)
    {   
        /**
         * Ambil data penumpang, seperti title dan namanya
         * karena data-data tersebut di kumpulkan jadi satu array, 
         * maka data tersebut perlu di looping kemudian dimasukkan ke
         * dalam array baru dengan key yang sesuai dengan yang ada di 
         * database
         */
        // $data = [];
        // foreach($validated['title_penumpang'] as $key=>$title){
        //     $data[$key] =  ['title'=>$title, 'nama_lengkap' => $validated['nama_penumpang'][$key]];
        // }
        
        // Masukkan data penumpang tersebut ke dalam tabel passengers
        // Passenger::insert($data);
        
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
        $flightorder = FlightOrder::create([
            'id' => uniqid("FO"),
            'id_pelanggan' => Auth::user()->id,
            'status' => 'IN_CART'
        ]);
        
        $flightorder->flightOrderDetails()->create(
            ['id_penerbangan' => $departureid->id]
        );
        
        if($arrivalid != null){
            $flightorder->flightOrderDetails()->create([
                ['id_penerbangan' => $arrivalid->id]
            ]);
        }
        return redirect()->route('checkout', $flightorder->id)->with('request', $request->all());
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
        $flight = Flight::with(['facilities', 'fromAirport', 'toAirport', 'plane.airline'])->where('id', $request->id)->firstOrFail();

        return response()->json(['success' => 'data sukses dikirim', 'flight'=>$flight]);
    }
}
