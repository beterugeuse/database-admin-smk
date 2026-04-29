<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
{
    /**
     * Izinkan request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk Jurusan.
     */
    public function rules(): array
    {
        $jurusanID =  $this->route('jurusan') ?  $this->route('jurusan')->id : null;

        return [
            'kode_jurusan' => 'required|string|max:10|unique:jurusans,kode_jurusan,' . $jurusanID,
            'nama_jurusan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string'
        ];
    }

    /**
     * Pesan error kustom dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi.',
            'kode_jurusan.max'      => 'Kode jurusan maksimal 10 karakter.',
            'kode_jurusan.unique'   => 'Kode jurusan sudah terdaftar, gunakan kode lain.',
            'nama_jurusan.required' => 'Nama jurusan tidak boleh kosong.',
            'nama_jurusan.max'      => 'Nama jurusan terlalu panjang.',
            'deskripsi.string'      => 'Deskripsi harus berupa teks.',
        ];
    }
}
