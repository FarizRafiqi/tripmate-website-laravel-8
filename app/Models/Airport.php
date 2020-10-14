<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    /**
     * Dapatkan penerbangan asal dari bandara tersebut
     */
    public function flightFrom()
    {
        return $this->hasOne("App\Models\Flight", "id_bandara_asal");
    }

    /**
     * Dapatkan penerbangan tujuan dari bandara tersebut
     */
    public function flightTo()
    {
        return $this->hasOne("App\Models\Flight", "id_bandara_tujuan");
    }

    public function city()
    {
        return $this->belongsTo("App\Models\City", 'id_kota');
    }
}
