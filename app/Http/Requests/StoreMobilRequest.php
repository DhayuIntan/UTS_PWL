<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMobilRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'plat_nomor' => 'required|string',
            'merk' => 'required|string|max:50',
            'tipe_mobil' => 'required|string|max:50',
            'status' => 'required|string',
        ];
    }
}
