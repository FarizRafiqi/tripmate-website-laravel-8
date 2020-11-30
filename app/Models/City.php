<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modul ini digunakan untuk mendapatkan model City dan juga relasi dari model ini.
 * 
 * Model ini memiliki relasi dengan model airport
 * relasi antara model kota dengan model airport adalah one to many,
 * artinya dalam suatu kota bisa saja terdapat banyak bandara
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 */
class City extends Model
{
    use HasFactory;

    /**
     * Method ini digunakan untuk mendapatkan banyak model airport dari kota tersebut
     */
    public function airports()
    {
        return $this->hasMany("App\Models\Airport");
    }
}
