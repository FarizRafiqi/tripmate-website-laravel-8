<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightFare extends Model
{
    use HasFactory;

    public function scopeGetFare($query, $category = 'dewasa')
    {
        $result = $query->where('category', $category)->value('price') ?? 0;
        return $result;
    }
}
