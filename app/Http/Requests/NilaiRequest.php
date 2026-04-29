<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NilaiRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan untuk membuat request ini.
     */
    public function authorize(): bool
    {
        // Ubah jadi true agar request ini bisa diproses
        return true;
    }

    /**
     * Aturan validasi yang berlaku untuk request ini.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'siswa_id'    => 'required|exists:siswas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'nullable|exists:gurus,id',
            'nilai_uts'   => 'required|numeric|between:0,100',
            'nilai_uas'   => 'required|numeric|between:0,100',
            'nilai_akhir' => 'nullable',
        ];
    }

    /**
     * Custom pesan error dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'siswa_id.exists' => 'Siswa yang dipilih tidak valid.',
            'mapel_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'guru_id.exists'  => 'Guru pengampu tidak valid.',
            'between'         => 'Rentang nilai harus antara 0 sampai 100.',
            'numeric'         => 'Kolom :attribute harus berupa angka.',
            'required'        => 'Kolom :attribute wajib diisi.',
        ];
    }
}
