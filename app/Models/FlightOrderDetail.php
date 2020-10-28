<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightOrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function flightOrder()
    {
        return $this->belongsTo("App\Models\FlightOrder", "id_pemesanan");
    }
}
