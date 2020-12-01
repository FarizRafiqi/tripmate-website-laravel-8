<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passengger extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function flightOrders()
    {
        return $this->belongsToMany('App\Models\FlightOrder')
                ->as('flight_order_details')
                ->withPivot('flight_id', 'plane_seat_id', 'category')
                ->withTimestamps();
    }
}
