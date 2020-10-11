<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany("App\Models\FlightDetail", "id_penerbangan");
    }

    /**
     * Dapatkan fasilitas dari penerbangan tersebut
     */
    public function facilities()
    {
        return $this->belongsToMany("App\Models\Facility", "flight_details", "id_penerbangan", "id_fasilitas")
        ->withPivot(["harga"])
        ->as("flight_details");
    }

    /**
     * Dapatkan bandara asal dari penerbangan tersebut
     */
    public function fromAirport()
    {
        return $this->belongsTo("App\Models\Airport", "id_bandara_asal");
    }

    /**
     * Dapatkan bandara tujuan dari penerbangan tersebut
     */
    public function toAirport()
    {
        return $this->belongsTo("App\Models\Airport", "id_bandara_tujuan");
    }

    
    /**
     * Dapatkan pesawat dari penerbangan tersebut
     */
    public function plane()
    {
        return $this->belongsTo("App\Models\Plane", "id_pesawat");
    }
    
    /**
     * Method ini digunakan untuk mendapatkan durasi penerbangan,
     * dengan menghitung interval antara waktu berangkat dan tiba suatu penerbangan
     */
    public function getFlightDuration()
    {
        $waktuberangkat = Carbon::parse($this->attributes["waktu_berangkat"]);
        $waktutiba = Carbon::parse($this->attributes["waktu_tiba"]);

        return $waktutiba->diffAsCarbonInterval($waktuberangkat)->locale("id");
    }
}
