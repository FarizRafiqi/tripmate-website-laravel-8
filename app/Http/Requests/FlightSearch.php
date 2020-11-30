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
            'origin'            => 'required',
            'destination'       => 'required|different:origin',
            'departure_date'    => 'required|date|after_or_equal:'.Carbon::now()->format('D, d M Y'),
            'arrival_date'      => 'date|different:departure_date|after:departure_date|nullable',
            'adult'             => 'numeric|max:7|min:1',
            'child'             => 'numeric|max:7|min:0',
            'infant'            => 'numeric|max:4|min:0|lte:adult',
        ];
    }

    public function messages()
    {
        return [
            'origin.required'      	            => 'Bandara asal tidak boleh kosong',
        	'destination.required'    	        => 'Bandara tujuan tidak boleh kosong',
        	'destination.different'   	        => 'Bandara asal dan tujuan harus berbeda',
        	'departure_date.required' 	        => 'Tanggal berangkat tidak boleh kosong',
        	'departure_date.date'     	        => 'Tanggal berangkat tidak valid',
        	'departure_date.after_or_equal'     => 'Tanggal berangkat tidak boleh kurang dari hari ini',
        	'arrival_date.different'	 	    => 'Tanggal berangkat dan pulang harus berbeda',
        	'adult.required'					=> 'Penumpang dewasa tidak boleh kosong',
        	'adult.max'						    => 'Penumpang dewasa maksimum 7',
        	'adult.min'						    => 'Penumpang dewasa minimal 1',
        	'infant.max'						=> 'Penumpang bayi maksimal 4',
        	'infant.lte'						=> 'Penumpang bayi tidak boleh lebih dari penumpang dewasa',
        ];
    }
}
