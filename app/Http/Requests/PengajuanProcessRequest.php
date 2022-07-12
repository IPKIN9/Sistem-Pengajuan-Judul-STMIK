<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanProcessRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_judul.*' => 'required|min:2|max:255',
            'descJudul.*' => 'required|min:5|max:255',
            'jurnal.*' => 'required',
        ];
    }
}
