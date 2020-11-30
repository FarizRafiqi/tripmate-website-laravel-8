<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model Flight dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model detail, facility, airport, dan plane.
 * Relasi antara model flight dengan model detail adalah one to many,
 * artinya suatu penerbangan bisa memiliki banyak detail penerbangan.
 * 
 * Relasi antara model flight dengan facility adalah many to many.
 * Artinya suatu penerbangan bisa memiliki banyak fasilitas, dan
 * suatu fasilitas bisa dimiliki oleh banyak penerbangan.
 * Oleh karena itu kehadiran tabel pivot diperlukan 
 * 
 * Hasil relasi many to many antara model flight dengan facility
 * adalah tabel flightdetails.
 * 
 * Kemudian, relasi antara model flight dengan airport adalah
 * one to one. Artinya suatu penerbangan hanya bisa menggunakan
 * 1 bandara, baik itu bandara asal maupun bandara tujuan
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class Flight extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'char';

    /**
     * Dapatkan detail penerbangan dari penerbangan tersebut
     */
    public function details()
    {
        return $this->hasMany("App\Models\FlightDetail");
    }

    /**
     * Dapatkan fasilitas dari penerbangan tersebut
     */
    public function facilities()
    {
        return $this->belongsToMany("App\Models\Facility", "flight_details")
        ->as("flight_details");
    }

    /**
     * Dapatkan bandara asal dari penerbangan tersebut
     */
    public function fromAirport()
    {
        return $this->belongsTo("App\Models\Airport", "departure_airport_id");
    }

    /**
     * Dapatkan bandara tujuan dari penerbangan tersebut
     */
    public function toAirport()
    {
        return $this->belongsTo("App\Models\Airport", "arrival_airport_id");
    }

    
    /**
     * Dapatkan pesawat dari penerbangan tersebut
     */
    public function plane()
    {
        return $this->belongsTo("App\Models\Plane");
    }
    
    public function flightOrders()
    {
        return $this->belongsToMany("App\Models\FlightOrder", "flight_order_details", "flight_id", "flight_order_id");
    }

    public function fares()
    {
        return $this->hasMany("App\Models\FlightFare");
    }
    /**
     * Method ini digunakan untuk mendapatkan durasi penerbangan, dengan menghitung
     * interval antara waktu berangkat dan tiba suatu penerbangan
     */
    public function getFlightDuration()
    {
        $departuretime = Carbon::parse($this->attributes["departure_time"]);
        $arrivaltime = Carbon::parse($this->attributes["arrival_time"]);

        return $arrivaltime->diffAsCarbonInterval($departuretime)->locale("id");
    }

    /**
     * Method ini digunakan untuk mengecek, apakah penerbangannya larut malam
     * jika benar maka akan mengembalikan nilai true, dan false jika salah
     */
    public function isRedEyeFlight()
    {
        $departuretime = Carbon::parse($this->attributes["departure_time"]);
        $arrivaltime = Carbon::parse($this->attributes["arrival_time"]);
        $duration = $departuretime->diffInDays($arrivaltime);
        return ($duration > 0) ? true : false;    
    }

    /**
     * Method ini digunakan untuk mencarikan penerbangan berdasarkan
     * waktu berangkat, waktu pulang, kota asal, kota tujuan,
     * dan juga kelas kabin
     */
    public function scopeSearch($query, $departuretime, $fromairport, $toairport, $cabinclass)
    {   
        return $query->whereDate("departure_time", Carbon::create($departuretime))
                ->where('departure_airport_id', $fromairport->id)
                ->where('arrival_airport_id', $toairport->id)
                ->where('class', strtolower($cabinclass));
    }
}
