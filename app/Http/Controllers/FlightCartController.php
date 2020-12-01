<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\FlightOrder;
use App\Models\Passengger;
use Illuminate\Support\Facades\Auth;

class FlightCartController extends Controller
{
    public function index(Request $request, $id)
    {
        $countdown = $request->cookie('countdown');
        // Cek apakah waktu pemesanannya sudah habis, jika sudah maka kembalikan ke halaman pencarian
        if(now() > $countdown){
            return redirect(session('referer'));
        }

        $cart = session('cart');
        //Cek apakah ada cart di dalam session dan id cartnya sama dengan parameter idnya
        if($cart && array_key_exists($id, $cart)){
            $cart = $cart[$id];
            //cek apakah ada penerbangan pulang, jika ada hitung total harga penerbangan pergi dan pulang
            if(isset($cart['return'])){
                $totalfare = $cart['departure']['detail']['totalfare']+$cart['return']['detail']['totalfare'];
            //jika tidak maka hanya hitung harga penerbangan pergi
            }else{
                $totalfare = $cart['departure']['detail']['totalfare'];
            }
            return view('web.frontend.transaction.cart.flight.index', compact('cart','countdown', 'request', 'totalfare'));
        //jika tidak ada maka tampilkan halaman 404 (not found)
        }else{
            abort(404);
        }
    }

    public function store(Request $request, Flight $flight)
    {
        $id = uniqid();
        $cart = session('cart');
        $countdown = now()->add('minutes', 30);
        if(!$cart){
            $cart[$id]['departure'] = [
                "flight"=>$flight,
                "detail"=>$request->except('_token')
            ];
            session()->put('cart', $cart);
            return ($request->trip == "oneway") ? 
                    redirect()->route('cart.flight.index', $id)->withInput()->cookie('countdown', $countdown, '/') :
                    response()->json(["success_message", "item berhasil ditambahkan ke dalam keranjang!"]);
        }

        $id = key($cart);
        if($request->flight_type == 'return'){
            $cart[$id]['return'] = [
                "flight"=>$flight,
                "detail"=>$request->except('_token', 'trip', 'origin', 'destination', 'departure_date', 'arrival_date', 'adult', 'child', 'infant', 'class')
            ];
            session()->put('cart', $cart);
        }else{
            $cart[$id]['departure'] = [
                "flight"=>$flight,
                "detail"=>$request->except('_token', 'trip', 'origin', 'destination', 'departure_date', 'arrival_date', 'adult', 'child', 'infant', 'class')
            ];
            unset($cart[$id]['return']);
            session()->put('cart', $cart);
        }
        $request->session()->put('referer', $request->header('referer'));
        return redirect()->route('cart.flight.index', $id)->withInput()->cookie('countdown', $countdown, 30,'/');  
       
    }

    public function storeOrder(CheckoutRequest $request, $id)
    {
        $validated = $request->validated();
        $cart = session('cart')[$id];
        $orderid = session('order_id');
        /**'
         * Pada saat pelanggan sudah memesan tiket penerbangan dan juga mengisi data penumpang, 
         * pelanggan akan diarahkan ke halaman pembayaran, tetapi apabila pelanggan kembali
         * ke halaman pemesanan kemudian ke halaman pembayaran lagi, pemesanan tersebut harus
         * di cek apakah pemesanan yang baru sama dengan pemesanan yang lama. Jika sama
         * maka perintahkan pelanggan tersebut untuk melanjutkan pemesanannya. Jika tidak
         * maka buat pemesanan yang baru.
         */
        if($orderid){
            $flightorder = FlightOrder::with('flightOrderDetails')->where('status', 'PENDING')->findOrFail($orderid);
            $details = $flightorder->flightOrderDetails()->get();
            foreach($details as $key=>$item){
                foreach($cart as $key2=> $val){
                    if($item->flight_id == $val['flight']->id):
                        return back()->with('info', 'Kamu punya pesanan yang serupa dengan ini. Agar tidak memesan hal yang sama, kamu bisa lanjutkan pesanan tersebut');
                    endif;
                }
            };
        }

        //Buat pesanan pelanggan
        $fo = FlightOrder::create(['user_id'=>Auth::user()->id, 'status'=>'PENDING']);
         //Masukkan data penumpang tersebut ke dalam tabel passengers
        foreach($validated['title_penumpang'] as $key=>$title){
            $passengers[] = Passengger::create(['title'=>$title, 'full_name' => $validated['nama_penumpang'][$key], 'category'=>$request->category[$key] ]);   
        }
        //Masukkan detail pemesanannya
        foreach($cart as $key=>$val){
            foreach($passengers as $passenger){
                $fo->passengers()->attach($passenger->id, ['flight_id' => $val['flight']->id, 'category'=>$key]);   
            }
        }
        //simpan id pemesanan tersebut ke dalam session, lalu arahkan ke halaman pembayaran
        $request->session()->put('order_id', $fo->id);
        return redirect()->route('payment.flight.index', $fo->id)->cookie('paymentTimeLeft', now()->addHour(), 30, '/');
    }

    /**
     * Method ini digunakan untuk menghapus session cart dan order id
     * ketika waktu pemesanan sudah habis. Kemudian diarahkan ke 
     * halaman pencarian
     */
    public function destroy(Request $request, $id)
    {
        //hapus session cart dan order_id
        $request->session()->forget(['cart.'.$id, 'order_id']);
        return redirect(session('referer'));
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
