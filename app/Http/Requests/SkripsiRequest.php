<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SkripsiRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_judul' => 'required|min:2|max:255',
            'peneliti' => 'required|min:2|max:255',
            'tempat_penelitian' => 'required|min:2|max:255',
            'abstrak' => 'required|min:2',
            'pembimbing1' => 'required|min:2|max:255',
            'pembimbing2' => 'required|min:2|max:255',
            'tgl_terbit' => 'required|date',
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
