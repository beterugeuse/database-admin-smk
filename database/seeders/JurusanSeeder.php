<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_jurusan' => 'TP',
                'nama_jurusan' => 'Teknik Pemesinan',
                'deskripsi'    => 'Mempelajari pengoperasian mesin perkakas, pengerjaan logam, dan proses produksi komponen mesin.',
            ],
            [
                'kode_jurusan' => 'TGM',
                'nama_jurusan' => 'Teknik Gambar Mesin',
                'deskripsi'    => 'Fokus pada perancangan desain teknik mesin, pembacaan gambar teknik, dan penggunaan perangkat lunak CAD.',
            ],
            [
                'kode_jurusan' => 'TL',
                'nama_jurusan' => 'Teknik Pengelasan',
                'deskripsi'    => 'Spesialisasi dalam teknik penyambungan logam menggunakan berbagai metode las industri dan fabrikasi logam.',
            ],
            [
                'kode_jurusan' => 'TJKT',
                'nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'deskripsi'    => 'Mempelajari instalasi jaringan, administrasi server, keamanan siber, dan infrastruktur telekomunikasi.',
            ],
            [
                'kode_jurusan' => 'PPLG',
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Gim',
                'deskripsi'    => 'Fokus pada pemrograman web, aplikasi mobile, manajemen database, serta pengembangan aset dan logika gim.',
            ],
            [
                'kode_jurusan' => 'ANM',
                'nama_jurusan' => 'Animasi',
                'deskripsi'    => 'Mempelajari pembuatan aset digital, karakter 2D/3D, rigging, dan proses produksi film animasi.',
            ],
            [
                'kode_jurusan' => 'DKV',
                'nama_jurusan' => 'Desain Komunikasi Visual',
                'deskripsi'    => 'Mempelajari komunikasi kreatif melalui visual, desain grafis, ilustrasi, fotografi, dan videografi.',
            ],
        ];

        // loop data dan masukkan ke database menggunakan Eloquent
        foreach ($data as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}
