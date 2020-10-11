<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    public function pesawat()
    {
        return $this->hasMany("App\Models\Plane", "id_maskapai");
    }
}
