<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home() {
        $airports = DB::table('bandara')->get();
        return view('web.frontend.index', ['airports' => $airports]);
    }
}
