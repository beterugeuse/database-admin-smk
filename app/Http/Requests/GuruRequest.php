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
        #yang diambil adalah parameter {user} dari route, jadi gunakan $this->route('user').
        $guruID =  $this->route('guru') ?  $this->route('guru')->id : null;
        return [
            'nip'                 => 'required|string|max:20|unique:gurus,nip,' . $guruID,
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:Perempuan,Laki-Laki',
            'tanggal_lahir'       => 'required|date',
            'pendidikan_terakhir' => 'required|in:D3,D4,S1,S2,S3',
            'jabatan'             => 'required|string|max:255',
            'no_telp'             => 'required|string|max:15',
            'email'               => 'required|email|unique:gurus,email,' . $guruID,
            'alamat'              => 'required|string',
            'status_kepegawaian'  => 'required|in:PNS,PPPK,Honorer,Tetap,Kontrak',

            // Untuk foto, kita validasi sebagai file gambar jika ada upload
            // Gunakan 'nullable' saat update agar foto lama tidak hilang jika tidak ganti
            'image'                => $this->isMethod('post')
                                    ? 'required|image|mimes:jpeg,png,jpg|max:2048'
                                    : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nip.unique'     => 'NIP sudah terdaftar di sistem.',
            'email.unique'   => 'Alamat email sudah digunakan oleh guru lain.',
            'image.image'     => 'File yang diupload harus berupa gambar.',
            'image.max'       => 'Ukuran foto maksimal adalah 2MB.',
            '*.required'     => 'Kolom :attribute wajib diisi.',
            '*.in'           => 'Pilihan pada :attribute tidak valid.',
        ];
    }
}
