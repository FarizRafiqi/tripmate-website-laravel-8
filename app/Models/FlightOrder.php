<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model FlightOrder dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model FlightOrderDetail. Relasi antara kedua model ini
 * adalah one to many. Artinya suatu pemesanan penerbangan memiliki banyak detail
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class FlightOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function flightOrderDetails()
    {
        return $this->hasMany("App\Models\FlightOrderDetail");
    }

    public function flights()
    {
        return $this->belongsToMany("App\Models\Flight", "flight_order_details", "flight_order_id", "flight_id");
    }

    public function passengers()
    {
        return $this->belongsToMany('App\Models\Passengger', 'flight_order_details')
                ->withPivot('flight_id','plane_seat_id', 'category')
                ->withTimestamps();
    }
}
