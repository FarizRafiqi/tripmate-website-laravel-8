<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightOrder extends Model
{
    use HasFactory;
    protected $keyType = 'char';
    public $incrementing = false;

    protected $guarded = [];
}
