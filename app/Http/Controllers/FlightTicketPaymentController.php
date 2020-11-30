<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightOrder;

class FlightTicketPaymentController extends Controller
{
    public function index(Request $request,FlightOrder $order)
    {
        $paymenttimeleft = $request->cookie('paymentTimeLeft');
        if(now() > $paymenttimeleft){
            return redirect(session('referer'));
        }

        $departureflight = $order->flightOrderDetails()->getFlightByCategory('departure');
        $departurepassenggers = $order->flightOrderDetails()->getFlightPassengerByCategory('departure');
        if(session('trip') == 'roundtrip'){
            $returnflight = $order->flightOrderDetails()->getFlightByCategory('return');
            $returnpassenggers = $order->flightOrderDetails()->getFlightPassengerByCategory('departure');
            return view("web.frontend.transaction.payment_flight", compact('order', 'departureflight', 'returnflight', 'departurepassenggers', 'returnpassenggers', 'paymenttimeleft'));
        }
        
        return view("web.frontend.transaction.payment_flight", compact('order', 'departureflight', 'departurepassenggers', 'paymenttimeleft'));
    }

    public function updateFlightOrder(Request $request, $id)
    {
        $request->session()->forget(['cart', 'order_id']);
        $fo = FlightOrder::find($id);
        $fo->status = 'CANCEL';
        $fo->save();
        return redirect(session('referer'));
    }
}
