<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    /**
     * Dapatkan maskapai yang memiliki pesawat tersebut
     */

     public function airline()
     {
         return $this->belongsTo("App\Models\Airline", "id_maskapai");
     }
}
