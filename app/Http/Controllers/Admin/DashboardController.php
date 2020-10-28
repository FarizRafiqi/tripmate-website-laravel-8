<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Modul ini digunakan untuk menampilkan halaman dashboard admin
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 * @date 18/10/2020
 */
class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('web.backend.dashboard');
    }
}
