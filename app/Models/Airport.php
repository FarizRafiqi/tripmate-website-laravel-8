<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model Airport dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan modol flight dan juga city
 * relasi antara bandara dengan penerbangan adalah one to many,
 * sedangkan relasi antara bandara dengan kota adalah many to one
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class Airport extends Model
{
    use HasFactory;

    /**
     * Method ini digunakan untuk mendapatkan penerbangan asal dari bandara tersebut
     */
    public function flightFrom()
    {
        return $this->hasOne("App\Models\Flight", "id_bandara_asal");
    }

    /**
     * Method ini digunakan untuk mendapatkan penerbangan tujuan dari bandara tersebut
     */
    public function flightTo()
    {
        return $this->hasOne("App\Models\Flight", "id_bandara_tujuan");
    }

    /**
     * Method ini digunakan untuk mendapatkan kota dari bandara tersebut
     */
    public function city()
    {
        return $this->belongsTo("App\Models\City", 'id_kota');
    }
}
