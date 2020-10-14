<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PlaneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
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
