<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ubah jadi true agar request ini diizinkan
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama_kelas'    => 'required|string|max:255',
            'tingkat'       => 'required|integer|min:10|max:13', // Contoh: Kelas 10-13
            'tahun_ajaran'  => 'required|string|max:10',      // Contoh: 2025/2026
            'jurusan_id'    => 'required|exists:jurusans,id', // Harus ada di tabel jurusans
            'wali_kelas_id' => 'required|exists:gurus,id',    // Harus ada di tabel gurus
            'kapasitas'     => 'required|integer|min:1',
        ];
    }

    /**
     * Custom error messages (Opsional, agar pesan lebih ramah)
     */
    public function messages(): array
    {
        return [
            'nama_kelas.required'    => 'Nama kelas wajib diisi.',
            'jurusan_id.exists'      => 'Jurusan yang dipilih tidak valid.',
            'wali_kelas_id.exists'   => 'Guru yang dipilih sebagai wali kelas tidak ditemukan.',
            'tingkat.integer'        => 'Tingkat harus berupa angka.',
            'kapasitas.min'          => 'Kapasitas minimal adalah 1 siswa.',
        ];
    }
}
