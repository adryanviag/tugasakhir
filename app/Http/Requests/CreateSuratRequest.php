<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSuratRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NoAgenda' => 'required|unique:tbmasuk|string|max:35',
            'Pengirim' => 'required|string|max:50',
            'TglDiterima' => 'required',
            'SifatSurat' => 'required',
            'StatusSurat' => 'required',
            'Lokasi' => 'required',
            'Klas' => 'required',
            'TglSurat' => 'required',
            'NoSurat' => 'required',
            'Lamp' => 'required',
            'IsiRingkas' => 'required',
            'TglHrsSelesai' => 'required',
            'Catatan' => 'required',
            // 'MasaAktif' => 'nullable',
            // 'MasaInAktif' => 'nullable',
            'LokasiMedia' => 'required|mimes:pdf|max:2048',
            // 'LokasiFisik' => 'nullable',
        ];
    }
}
