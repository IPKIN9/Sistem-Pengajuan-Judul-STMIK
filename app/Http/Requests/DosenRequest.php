<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DosenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|min:2|max:255',
            'NIDN' => 'required|numeric|min:5',
            'jabatan' => 'required|min:2|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response' => array(
                'icon' => 'error',
                'title' => 'Validasi Gagal',
                'message' => 'Data yang di input tidak tervalidasi',
            ),
            'errors' => array(
                'length' => count($validator->errors()),
                'data' => $validator->errors()
            ),
        ], 422));
    }
}
