<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $guruID =  $this->route('guru') ?  $this->route('guru')->id : null;

        return [
            'nip'     => 'required|string|max:20|unique:gurus,nip,' . $guruID,
            'nama'    => 'required|string|max:255',
            'telepon' => 'nullable|string|max:15',
            'alamat'  => 'required|string',
        ];
    }
}
