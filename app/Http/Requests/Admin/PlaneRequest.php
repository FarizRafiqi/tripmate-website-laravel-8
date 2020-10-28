<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Modul ini digunakan untuk menangani request form pesawat di halaman admin
 */
class PlaneRequest extends FormRequest
{
    /**
     * Menentukan jika user diizinkan untuk membuat request ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Dapatkan aturan validasi yang akan diterapkan ke request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_maskapai' => 'required',
            'model' => 'required|string',
            'jumlah_kursi' => 'required|integer|min:0',
            'deskripsi' => 'string',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
    }
}
