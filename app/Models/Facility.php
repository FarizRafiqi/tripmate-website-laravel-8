<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model Facility dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model flightdetail
 * relasi antara model facility dengan model flightdetail adalah many to one,
 * artinya banyak fasilitas dimiliki oleh satu detail penerbangan
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class Facility extends Model
{
    use HasFactory;

    /**
     * Dapatkan penerbangan yang mempunyai id fasilitas ini
     */
    public function flight()
    {
        return $this->belongsTo("App\Models\FlightDetail", "id_fasilitas");
    }
}
