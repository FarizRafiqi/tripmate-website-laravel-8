<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightOrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Dapatkan pemesanan penerbangan
     */
    public function flightOrder()
    {
        return $this->belongsTo("App\Models\FlightOrder");
    }

    /**
     * Dapatkan penerbangan
     */
    public function flight()
    {
        return $this->belongsTo("App\Models\Flight");
    }

    public function passengger()
    {
        return $this->belongsTo("App\Models\Passengger");
    }
    /**
     * Dapatkan penerbangan yang memiliki kategori tertentu
     */
    public function scopeGetFlightByCategory($query, $category){
        return $query->where('category', $category)->first()->flight;
    }

    /**
     * Dapatkan penumpang penerbangan yang memiliki kategori tertentu
     */
    public function scopeGetFlightPassengerByCategory($query, $category){
        foreach($query->where('category', $category)->get() as $item ){
            $passenggers[] = $item->passengger;
        }
        return collect($passenggers);
    }
}
