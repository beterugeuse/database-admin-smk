<?php

namespace Database\Factories;

use App\Models\MataPelajaran;
use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MataPelajaran>
 */
class MataPelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                // Mengambil nama mapel secara acak dari daftar ini
                'mata_pelajaran' => fake()->randomElement([
                    'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris',
                    'Pemrograman Web', 'Basis Data', 'PBO', 'PPKN', 'PJOK'
                ]),
                'jurusan' => fake()->randomElement(['RPL', 'TKJ', 'MM']),

                // Cara sakti: Mengambil 1 ID Guru yang sudah ada di database secara acak
                // Jika tabel guru kosong, dia akan otomatis membuat 1 guru baru
                'guru_id' => Guru::inRandomOrder()->first()->id ?? Guru::factory(),
        ];
    }
}
