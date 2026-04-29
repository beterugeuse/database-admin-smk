<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nip'               => '19891012010011001',
                'nama_lengkap'      => 'Gojo Satoru S.Pd',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1989-12-07',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Ketua Program Keahlian PPLG',
                'no_telp'           => '081234567890',
                'email'             => 'gojo@smk.edu',
                'alamat'            => 'Jl. Buah Batu No. 123, Bandung',
                'status_kepegawaian'=> 'PNS',
                'image'             => 'gojo-satoru.jpeg',
            ],
            [
                'nip'               => '200405122020122002',
                'nama_lengkap'      => 'Dr. Ishigami Senku',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '2004-01-04',
                'pendidikan_terakhir' => 'S3',
                'jabatan'           => 'Guru Produktif TP',
                'no_telp'           => '082198765432',
                'email'             => 'senku@smk.edu',
                'alamat'            => 'Kopo Permai Blok C, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'ishigami-senku.png',
            ],
            [
                'nip'               => '1986823477129003',
                'nama_lengkap'      => 'Ukai Keishin S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1986-04-05',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Produktif TL',
                'no_telp'           => '085711223344',
                'email'             => 'ukai@gmail.com',
                'alamat'            => 'Cicaheum Raya No. 45, Bandung',
                'status_kepegawaian' => 'Honorer',
                'image'             => 'ukai-keishin.jpg',
            ],
        ];

        foreach ($data as $guru) {
            Guru::create($guru);
        }
    }
}
