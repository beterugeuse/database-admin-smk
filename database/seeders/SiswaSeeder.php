<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil data kelas
        $pplg = Kelas::where('nama_kelas', 'X PPLG 1')->first();
        $tjkt = Kelas::where('nama_kelas', 'XII TJKT 1')->first();
        $anm  = Kelas::where('nama_kelas', 'XI ANM 1')->first();

        $data = [
            [
                'nis'           => '222310001',
                'nisn'          => '0081234561',
                'nama_lengkap'  => 'Salsabila Zahra',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2008-05-15',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Antapani No. 1, Bandung',
                'no_telp'       => '081200000001',
                'email'         => 'salsa@gmail.com',
                'kelas_id'      => $pplg->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-1.jpg',
            ],

            [
                'nis'           => '222310002',
                'nisn'          => '0081234562',
                'nama_lengkap'  => 'Siti Rahmawati',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2008-08-20',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Dago No. 2, Bandung',
                'no_telp'       => '081200000002',
                'email'         => 'siti@gmail.com',
                'kelas_id'      => $pplg->id,
                'status'        => 'Aktif',
                'image'         => 'https://i.pinimg.com/736x/ba/5a/70/ba5a7064b4b1f9b260df25901008e21c.jpg',
            ],

            [
                'nis'           => '222310003',
                'nisn'          => '0081234563',
                'nama_lengkap'  => 'Rendi Pangestu',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-02-10',
                'agama'         => 'Kristen',
                'alamat'        => 'Jl. Kopo No. 3, Bandung',
                'no_telp'       => '081200000003',
                'email'         => 'rendi@gmail.com',
                'kelas_id'      => $tjkt->id,
                'status'        => 'Aktif',
                'image'         => 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2022/11/Jujutsu-Kaisen-Itadori.jpg',
            ],

            [
                'nis'           => '222310004',
                'nisn'          => '0081234564',
                'nama_lengkap'  => 'Budi Cahyono',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-03-12',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Buah Batu No. 4, Bandung',
                'no_telp'       => '081200000004',
                'email'         => 'budi@gmail.com',
                'kelas_id'      => $tjkt->id,
                'status'        => 'Aktif',
                'image'         => 'https://static.wikia.nocookie.net/haikyuu-fanon/images/1/19/Atsumu_Miya.jpg',
            ],

            [
                'nis'           => '222310005',
                'nisn'          => '0081234565',
                'nama_lengkap'  => 'Putra Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-11-05',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Pasteur No. 5, Bandung',
                'no_telp'       => '081200000005',
                'email'         => 'putra@gmail.com',
                'kelas_id'      => $anm->id,
                'status'        => 'Aktif',
                'image'         => 'https://i.pinimg.com/736x/8b/ca/e1/8bcae1e13613ba72a67c3be6b779d2a1.jpg',
            ],
        ];

        foreach ($data as $siswa) {
            Siswa::updateOrCreate(
                ['nis' => $siswa['nis']],
                $siswa
            );
        }
    }
}
