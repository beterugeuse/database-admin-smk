<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // cari dulu data jurusan untuk dapat id
        $pplg = Jurusan::where('kode_jurusan', 'PPLG')->first();
        $tjkt = Jurusan::where('kode_jurusan', 'TJKT')->first();
        $anm  = Jurusan::where('kode_jurusan', 'ANM')->first();

        $guru1 = Guru::where('nama_lengkap', 'LIKE', '%Gojo%')->first();
        $guru2 = Guru::where('nama_lengkap', 'LIKE', '%Senku%')->first();
        $guru3  = Guru::where('nama_lengkap', 'LIKE', '%Ukai%')->first();


        $data = [
            // jurusan PPLG
            [
                'nama_kelas'    => 'X PPLG 1',
                'tingkat'       => 10,
                'tahun_ajaran'  => '2025/2026',
                'jurusan_id'    => $pplg->id,
                'wali_kelas_id' => $guru1->id,
                'kapasitas'     => 36,
            ],
            // jurusan TJKT
            [
                'nama_kelas'    => 'XII TJKT 1',
                'tingkat'       => 12,
                'tahun_ajaran'  => '2025/2026',
                'jurusan_id'    => $tjkt->id,
                'wali_kelas_id' => $guru2->id,
                'kapasitas'     => 38,
            ],
            // jurusan ANM
            [
                'nama_kelas'    => 'XI ANM 1',
                'tingkat'       => 11,
                'tahun_ajaran'  => '2025/2026',
                'jurusan_id'    => $anm->id,
                'wali_kelas_id' => $guru3->id,
                'kapasitas'     => 35,
            ],
        ];

        // 3. Tinggal kita looping pakai foreach biasa
        foreach ($data as $kelas) {
            Kelas::create($kelas);
        }
    }
}
