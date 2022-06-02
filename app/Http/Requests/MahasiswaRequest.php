<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MahasiswaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|min:2|max:255',
            'nim' => 'required|min:10|numeric',
            'jurusan' => 'required|min:3|max:50',
            'hp' => 'required|min:10|numeric',
            'alamat' => 'required|min:5|max:255',
            'jk' => 'required|min:3|max:20',
            'angkatan' => 'required|min:2|max:10',
            'kelas' => 'required|min:3|max:50',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
