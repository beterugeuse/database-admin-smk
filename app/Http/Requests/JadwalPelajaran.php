<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JadwalPelajaranRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan untuk melakukan request ini.
     */
    public function authorize(): bool
    {
        // Ubah menjadi true agar request diizinkan
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
            'kelas_id'    => 'required|exists:kelas,id',
            'mapel_id'    => 'required|exists:mapels,id',
            'guru_id'     => 'required|exists:gurus,id',
            'hari'        => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan'     => 'required|string|max:255',
        ];
    }

    /**
     * Custom error messages (Opsional).
     */
    public function messages(): array
    {
        return [
            'kelas_id.exists'     => 'Kelas yang dipilih tidak valid.',
            'mapel_id.exists'     => 'Mata pelajaran yang dipilih tidak valid.',
            'guru_id.exists'      => 'Guru yang dipilih tidak valid.',
            'hari.in'             => 'Hari harus di antara Senin sampai Sabtu.',
            'jam_selesai.after'   => 'Jam selesai harus lebih besar dari jam mulai.',
            'date_format'         => 'Format waktu harus HH:mm (contoh: 07:00).',
        ];
    }

}
