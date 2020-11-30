<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model Plane dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model Airline. Relasi antara kedua model ini
 * adalah many to one. Artinya suatu pesawat bisa dimiliki oleh
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class Plane extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Dapatkan maskapai yang memiliki pesawat tersebut
     */

     public function airline()
     {
         return $this->belongsTo("App\Models\Airline");
     }
}
