<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PlaneRequest;
use App\Models\Airline;
use App\Models\Plane;

/**
 * Modul ini digunakan untuk menambah, mengubah, menghapus,
 * dan menampilkan data pesawat
 * 
 * @author Aulia El-Ihza Fariz Rafiqi
 * @version 1.0
 * @date 18/10/2020
 */
class PlaneController extends Controller
{
    /**
     * Menampilkan data-data pesawat
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::all();

        return view('web.backend.transportation.plane.index', compact('planes'));
    }

    /**
     * Menampilkan form tambah pesawat
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('web.backend.transportation.plane.create', compact('airlines'));
    }

    /**
     * Menyimpan data pesawat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneRequest $request)
    {
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store(
            'assets/plane', 'public'
        );
        
        Plane::create($data);

        return redirect()->route('plane.index');
    }

    /**
     * Menampilkan detail pesawat tertentu
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Menampilkan form ubah data pesawat
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        $airlines = Airline::all();
        return view('web.backend.transportation.plane.edit', compact('plane', 'airlines'));
    }

    /**
     * Mengupdate/memperbarui data pesawat tertentu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Menghapus data pesawat tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
