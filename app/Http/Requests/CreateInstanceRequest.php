<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kode' => 'required|unique:tbinstansi|max:15',
            'instansi' => 'required|max:35',
            'kdunit' => 'required',
            'kontak' => 'nullable',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'kodepos' => 'nullable',
            'telpon' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable|email:dns,rfc',
            'web' => 'nullable',
        ];
    }
}
