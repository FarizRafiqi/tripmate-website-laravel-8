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
    protected $keyType = 'char';
    public $incrementing = false;

    protected $guarded = [];

    public function flightOrderDetails()
    {
        return $this->hasMany("App\Models\FlightOrderDetail", "id_pemesanan");
    }
}
