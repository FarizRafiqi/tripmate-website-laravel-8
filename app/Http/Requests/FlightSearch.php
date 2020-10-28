<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Support\Carbon;

/**
 * Modul ini digunakan untuk menangani request form pencarian penerbangan
 */
class FlightSearch extends FormRequest
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
     *  Dapatkan aturan validasi yang akan diterapkan ke request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bandara_asal'      => 'required',
            'bandara_tujuan'    => 'required|different:bandara_asal',
            'tanggal_berangkat' => 'required|date|after_or_equal:'.Carbon::now()->format('D, d M Y'),
            'tanggal_pulang'    => 'date|different:tanggal_berangkat|after:tanggal_berangkat|nullable',
            'dewasa'           => 'numeric|max:7|min:1',
            'anak'             => 'numeric|max:7|min:0',
            'bayi'             => 'numeric|max:4|min:0|lte:dewasa',
        ];
    }

    public function messages()
    {
        return [
            'bandara_asal.required'      	    => ':attribute tidak boleh kosong',
        	'bandara_tujuan.required'    	    => ':attribute tidak boleh kosong',
        	'bandara_tujuan.different'   	    => 'Bandara asal dan tujuan harus berbeda',
        	'tanggal_berangkat.required' 	    => ':attribute tidak boleh kosong',
        	'tanggal_berangkat.date'     	    => ':attribute tidak valid',
        	'tanggal_berangkat.after_or_equal'  => ':attribute tidak boleh kurang dari hari ini',
        	'tanggal_pulang.different'	 	    => 'Tanggal berangkat dan pulang harus berbeda',
        	'dewasa.required'					=> 'Penumpang :attribute tidak boleh kosong',
        	'dewasa.max'						=> 'Penumpang :attribute maksimum 7',
        	'dewasa.min'						=> 'Penumpang :attribute minimal 1',
        	'bayi.max'							=> 'Penumpang :attribute maksimal 4',
        	'bayi.lte'							=> 'Penumpang :attribute tidak boleh lebih dari penumpang dewasa',
        ];
    }
}
