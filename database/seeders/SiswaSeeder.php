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
                'image'         => 'siswa-2.jpg',
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
                'image'         => 'siswa-3.jpg',
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
                'image'         => 'siswa-4.jpg',
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
                'image'         => 'siswa-5.jpg',
            ],

            [
                'nis'           => '222310006',
                'nisn'          => '0081234566',
                'nama_lengkap'  => 'Eko Prasetyo',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-07-25',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Cicaheum No. 6, Bandung',
                'no_telp'       => '081200000006',
                'email'         => 'eko@gmail.com',
                'kelas_id'      => $anm->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-6.jpg',
            ],

            [
                'nis'           => '222310007',
                'nisn'          => '0081234567',
                'nama_lengkap'  => 'Zeno Febri',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-09-30',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Setiabudi No. 7, Bandung',
                'no_telp'       => '081200000007',
                'email'         => 'zeno@gmail.com',
                'kelas_id'      => $pplg->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-7.jpg',
            ],

            [
                'nis'           => '222310008',
                'nisn'          => '0081234568',
                'nama_lengkap'  => 'Gilang Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-10-15',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Cibaduyut No. 8, Bandung',
                'no_telp'       => '081200000008',
                'email'         => 'gilang@gmail.com',
                'kelas_id'      => $tjkt->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-8.jpg',
            ],

            [
                'nis'           => '222310009',
                'nisn'          => '0081234569',
                'nama_lengkap'  => 'Hanif Bagas',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-12-22',
                'agama'         => 'Islam',
                'alamat'        => 'Jl. Gedebage No. 9, Bandung',
                'no_telp'       => '081200000009',
                'email'         => 'hanif@gmail.com',
                'kelas_id'      => $anm->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-9.jpg',
            ],

            [
                'nis'           => '222310010',
                'nisn'          => '0081234570',
                'nama_lengkap'  => 'Indra Wijaya',
                'jenis_kelamin' => 'Laki-Laki',
                'tanggal_lahir' => '2008-01-05',
                'agama'         => 'Kristen',
                'alamat'        => 'Jl. Asia Afrika No. 10, Bandung',
                'no_telp'       => '081200000010',
                'email'         => 'indra@gmail.com',
                'kelas_id'      => $pplg->id,
                'status'        => 'Aktif',
                'image'         => 'siswa-10.jpg',
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
