<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSuratRequest extends FormRequest
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
