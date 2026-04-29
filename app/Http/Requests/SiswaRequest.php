<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Mengambil ID siswa untuk pengecekan unique saat update
        $siswaID = $this->route('siswa') ? (is_object($this->route('siswa')) ? $this->route('siswa')->id : $this->route('siswa')) : null;

        return [
            'nis'           => 'required|string|max:20|unique:siswas,nis,' . $siswaID,
            'nisn'          => 'required|string|max:20|unique:siswas,nisn,' . $siswaID,
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Perempuan,Laki-Laki',
            'tanggal_lahir' => 'required|date',
            'agama'         => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'alamat'        => 'required|string|max:255',
            'no_telp'       => 'required|string|max:15',
            'email'         => 'required|email|unique:siswas,email,' . $siswaID,
            'kelas_id'      => 'required|exists:kelas,id',
            'status'        => 'required|in:Aktif,Alumni,Pindah,Keluar',

            // Foto wajib diisi saat create (POST), tapi opsional saat update (PUT/PATCH)
            'image'          => $this->isMethod('post')
                               ? 'required|image|mimes:jpeg,png,jpg|max:2048'
                               : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nis.unique'      => 'NIS ini sudah terdaftar.',
            'nisn.unique'     => 'NISN ini sudah terdaftar.',
            'email.unique'    => 'Email ini sudah digunakan oleh siswa lain.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak ditemukan.',
            '*.required'      => 'Kolom :attribute wajib diisi.',
            '*.in'            => 'Pilihan pada :attribute tidak valid.',
            'image.image'     => 'File harus berupa gambar (jpeg, png, jpg).',
            'image.max'       => 'Ukuran foto maksimal adalah 2MB.',
        ];
    }
}
