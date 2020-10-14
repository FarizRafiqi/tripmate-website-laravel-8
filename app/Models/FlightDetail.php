<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightDetail extends Model
{
    use HasFactory;
    /**
     * Dapatkan penerbangan yang memiliki detail tersebut
     */
    public function flight()
    {
        return $this->belongsTo("App\Models\Flight");
    }

    public function facility()
    {
        return $this->belongsTo("App\Models\Facility", "id_fasilitas");
    }
}
