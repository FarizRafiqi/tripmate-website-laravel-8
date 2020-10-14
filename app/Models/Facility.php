<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
