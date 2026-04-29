<?php

namespace Database\Seeders;

use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        // cari dulu data jurusan untuk dapat id
        $pplg = Jurusan::where('kode_jurusan', 'PPLG')->first();
        $tjkt = Jurusan::where('kode_jurusan', 'TJKT')->first();

        $guru1 = Guru::where('nama_lengkap', 'LIKE', '%Ukai%')->first();
        $guru2 = Guru::where('nama_lengkap', 'LIKE', '%Gojo%')->first();
        $guru3  = Guru::where('nama_lengkap', 'LIKE', '%Senku%')->first();

        $data = [
            // mapel PPLG
            [
                'kode_mapel'    => 'PPLG-001',
                'nama_mapel'    => 'Pemrograman Web Dasar',
                'jam_pelajaran' => 4,
                'guru_id'       => $guru1->id,
                'jurusan_id'    => $pplg->id,
            ],
            [
                'kode_mapel'    => 'PPLG-002',
                'nama_mapel'    => 'Basis Data',
                'jam_pelajaran' => 3,
                'guru_id'       => $guru2->id,
                'jurusan_id'    => $pplg->id,
            ],
            [
                'kode_mapel'    => 'PPLG-003',
                'nama_mapel'    => 'Pemrograman Berorientasi Objek',
                'jam_pelajaran' => 6,
                'guru_id'       => $guru3->id,
                'jurusan_id'    => $pplg->id,
            ],
            // mapel TJKT
            [
                'kode_mapel'    => 'TJKT-001',
                'nama_mapel'    => 'Administrasi Infrastruktur Jaringan',
                'jam_pelajaran' => 6,
                'guru_id'       => $guru1->id,
                'jurusan_id'    => $tjkt->id,
            ],
            [
                'kode_mapel'    => 'TJKT-002',
                'nama_mapel'    => 'Keamanan Jaringan',
                'jam_pelajaran' => 4,
                'guru_id'       => $guru2->id,
                'jurusan_id'    => $tjkt->id,
            ],
        ];

        foreach ($data as $mapel) {
            Mapel::create($mapel);
        }
    }
}
