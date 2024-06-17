<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'idTamu' => 'required|unique:guests,idTamu|min:6|max:6',
            'idKamar' => 'required|unique:rooms,idkamar|min:4|max:4',
            'tglMasuk' => 'required',
            'tglKeluar' => 'required',
            'totalHarga' => 'required|numeric',
        ];
    }
}
