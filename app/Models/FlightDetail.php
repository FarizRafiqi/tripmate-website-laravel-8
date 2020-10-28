<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model FlightDetail dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model flight dan facility.
 * Relasi antara model flightdetail dengan model flight adalah many to one,
 * artinya banyak detail penerbangan dimiliki oleh satu penerbangan.
 * 
 * Sedangkan relasi antara model flightdetail dengan model facility
 * adalah many to one. Artinya banyak detail penerbangan dimiliki
 * oleh satu fasilitas
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class FlightDetail extends Model
{
    use HasFactory;
    /**
     * Dapatkan penerbangan yang memiliki detail penerbangan tersebut
     */
    public function flight()
    {
        return $this->belongsTo("App\Models\Flight");
    }

    /**
     * Dapatkan fasilitas yang memiliki detail penerbangan tersebut
     */
    public function facility()
    {
        return $this->belongsTo("App\Models\Facility", "id_fasilitas");
    }
}
