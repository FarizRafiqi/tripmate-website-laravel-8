<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        'trip',
        'infant',
        'child',
        'adult', 
        'destination',
        'origin',
        'departure_date',
        'arrival_date',
        'class'
    ];
}
