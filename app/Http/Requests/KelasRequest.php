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

     $kelasID =  $this->route('kelas') ?  $this->route('kelas')->id : null;
        return [
            'nama_kelas'    => 'required|string|max:255|unique:kelas,nama_kelas,' . $kelasID,
            'tingkat'       => 'required|integer|min:10|max:12',
            'tahun_ajaran'  => 'required|string|max:10',
            'jurusan_id'    => 'required|exists:jurusans,id',
            'wali_kelas_id' => 'required|exists:gurus,id',
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
