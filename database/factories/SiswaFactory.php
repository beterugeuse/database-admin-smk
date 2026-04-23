<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis'     => fake()->unique()->numerify('##########'), // 10 digit angka unik
            'nama'    => fake()->name(),
            'kelas'   => fake()->randomElement(['X', 'XI', 'XII']),
            'jurusan' => fake()->randomElement(['RPL', 'TKJ', 'MM', 'DPIB']),
            'alamat'  => fake()->address(),
        ];
    }
}
