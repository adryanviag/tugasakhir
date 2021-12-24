<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'KdLokasi' => 'required|unique:tblokasi|max:15',
            'KdUnit' => 'required',
            'Desk' => 'required|max:35',
        ];
    }
}
