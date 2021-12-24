<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClassificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Kode' => 'required|unique:tbklas|max:15',
            'Klas' => 'required|max:35',
            'Aktif' => 'required|max:2',
            'InAktif' => 'required|max:2',
            'TindakLanjut' => 'required|max:20'
        ];
    }
}
