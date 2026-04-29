<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mapel;

class MapelRequest extends FormRequest
{
    /**
     * Izinkan request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk Mata Pelajaran.
     */
    public function rules(): array
    {
        // Ambil ID mapel dari route untuk pengecekan unique saat update
        // Pastikan nama parameter di route kamu adalah 'mapel' (cek php artisan route:list)
        $mapel   = $this->route('mapel');
        $mapelID = $mapel instanceof Mapel ? $mapel->id : null;

        return [
            'kode_mapel'    => 'required|string|max:10|unique:mapels,kode_mapel,' . $mapelID,
            'nama_mapel'    => 'required|string|max:255',
            'jam_pelajaran' => 'required|integer|min:1|max:20',
            'guru_id'       => 'required|exists:gurus,id',
            'jurusan_id'    => 'required|exists:jurusans,id',
        ];
    }

    /**
     * Pesan error kustom dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'kode_mapel.required'    => 'Kode mata pelajaran wajib diisi.',
            'kode_mapel.unique'      => 'Kode mata pelajaran sudah digunakan.',
            'kode_mapel.max'         => 'Kode mata pelajaran maksimal 10 karakter.',
            'nama_mapel.required'    => 'Nama mata pelajaran tidak boleh kosong.',
            'jam_pelajaran.required' => 'Jumlah jam pelajaran wajib diisi.',
            'jam_pelajaran.integer'  => 'Jam pelajaran harus berupa angka.',
            'guru_id.required'       => 'Guru pengampu wajib dipilih.',
            'guru_id.exists'         => 'Data guru tidak ditemukan.',
            'jurusan_id.required'    => 'Jurusan harus dipilih.',
            'jurusan_id.exists'      => 'Jurusan yang dipilih tidak valid.',
        ];
    }
}
