<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model Airline dan juga relasi dari model ini.
 * 
 * Model ini berelasi dengan model city, relasi antara model airline dengan city
 * adalah one to many
 * 
 * @author Aulia EL-Ihza Fariz Rafiqi
 * @version 1.0
 */
class Airline extends Model
{
    use HasFactory;
    /**
     * Dapatkan kota dari maskapai tersebut
     */
    public function city()
    {
        return $this->belongsTo("App\Models\City", "id_kota");
    }
}
