<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Modul ini digunakan untuk menangani request di halaman checkout
 */
class CheckoutRequest extends FormRequest
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
        $rules=[
            'title_pemesan' => 'required|string',
            'nama_pemesan'  => 'required|string|min:3',
            'email'         => 'required|string|email',
            'telepon'       => 'required|regex:/(08)[0-9]{10}/',
        ];
        /**
         * Buat rules untuk semua input nama_penumpang dan title_penumpang,
         * karena input yang ada sangat banyak, maka menggunakan foreach
         * akan lebih mudah
         */

        foreach ($this->request->get('title_penumpang') as $key => $value) {
            // Beri rules untuk setiap input yang namenya title_penumpang
            $rules['title_penumpang.'.$key] = 'required|string';
        }

        foreach ($this->request->get('nama_penumpang') as $key => $value) {
            // Beri rules untuk setiap input yang namenya nama_penumpang
            $rules['nama_penumpang.'.$key] = 'required|string|min:3';
        }
        
        // Cek apakah ada input tanggal_lahir, jika ada maka beri rules
        if($this->request->get('tanggal_lahir') !== null){
            foreach ($this->request->get('tanggal_lahir') as $key => $value) {
                $rules['tanggal_lahir.'.$key] = 'required|date';
            }
        }

        return $rules;
    }

    /**
     * Method ini digunakan untuk menampilkan pesan error, jika aturan validasi tidak terpenuhi
     * 
     * @return array
     */
    public function messages()
    {
        $message = [];
        $i=1;

        //Buat pesan error custom untuk setiap input
        foreach ($this->request->get('title_penumpang') as $key => $value) {
            $message['title_penumpang.'.$key.'.required'] = 'Title tidak boleh kosong';
            $message['title_penumpang.'.$key.'.string'] = 'Title harus berupa abjad';
        }

        foreach ($this->request->get('nama_penumpang') as $key => $value) {
           $message['nama_penumpang.'.$key.'.required'] = 'Silakan isi Penumpang '.$i++;
           $message['nama_penumpang.'.$key.'.string'] = 'Nama harus berupa huruf';
           $message['nama_penumpang.'.$key.'.min'] = 'Nama lengkap harus lebih dari atau sama dengan 3 karakter';
        }

        if($this->request->get('tanggal_lahir') !== null){
            foreach ($this->request->get('tanggal_lahir') as $key => $value) {
                $message['tanggal_lahir.'.$key.'.required'] = 'Tanggal lahir harus diisi';
                $message['tanggal_lahir.'.$key.'.date'] = 'Tanggal lahir tidak valid';
            }
        }

        return $message;
    }
}
