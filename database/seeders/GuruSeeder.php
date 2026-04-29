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
                'nama_lengkap'      => 'Gojo Satoru, S.Pd.',
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
                'image'             => 'https://practicaltyping.com/wp-content/uploads/2024/11/Senku.png',
            ],

            [
                'nip'               => '1986823477129003',
                'nama_lengkap'      => 'Ukai Keishin, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1986-04-05',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Produktif TL',
                'no_telp'           => '085711223344',
                'email'             => 'ukai@gmail.com',
                'alamat'            => 'Cicaheum Raya No. 45, Bandung',
                'status_kepegawaian' => 'Honorer',
                'image'             => 'https://static.wikia.nocookie.net/haikyuu/images/b/bc/Keishin_s3_e8.png',
            ],
            [
                'nip'               => '197809152005011004',
                'nama_lengkap'      => 'Agus Setiawan, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1978-09-15',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Produktif TJKT',
                'no_telp'           => '081233445504',
                'email'             => 'agus.setiawan@smk.edu',
                'alamat'            => 'Jl. Antapani No. 22, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://selfietime.id/storage/blogs/images/6DsiqMJEPyMcbXaKpsVkLTlHhxacDZq5MmU1Ing1.png',
            ],
            [
                'nip'               => '198201012008011005',
                'nama_lengkap'      => 'Hendra Wijaya, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1982-01-01',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Kepala Bengkel Mesin',
                'no_telp'           => '081299887705',
                'email'             => 'hendra.wijaya@smk.edu',
                'alamat'            => 'Panyileukan Indah Blok D, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://selfietime.sgp1.cdn.digitaloceanspaces.com/development/public/1288706/5p6lG5b8sLSstCJIxYevazaMvosmkp-metaamVvbmd3b28gdHJlam8gY292ZXIgKDEpLmpwZw==-.jpg',
            ],
            [
                'nip'               => '199503072021012006',
                'nama_lengkap'      => 'Rina Marlina, S.Pd.',
                'jenis_kelamin'     => 'Perempuan',
                'tanggal_lahir'     => '1995-03-07',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Produktif DKV',
                'no_telp'           => '087712345606',
                'email'             => 'rina.marlina@smk.edu',
                'alamat'            => 'Gegerkalong Girang No. 12, Bandung',
                'status_kepegawaian' => 'Tetap',
                'image'             => 'https://us.oricon-group.com/upimg/sns/2000/2940/img1200/jjk-EP30%20(5).jpg',
            ],
            [
                'nip'               => '199201202018012007',
                'nama_lengkap'      => 'Sari Fatimah, S.Pd.',
                'jenis_kelamin'     => 'Perempuan',
                'tanggal_lahir'     => '1992-01-20',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Bahasa Indonesia',
                'no_telp'           => '081322334407',
                'email'             => 'sari.fatimah@smk.edu',
                'alamat'            => 'Arcamanik Residence, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://i.pinimg.com/736x/9c/7e/9c/9c7e9c6f99a7cd29cbf4295c33d5ed8a.jpg',
            ],
            [
                'nip'               => '199402102020012008',
                'nama_lengkap'      => 'Maya Indah, S.Pd.',
                'jenis_kelamin'     => 'Perempuan',
                'tanggal_lahir'     => '1994-02-10',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Produktif PPLG',
                'no_telp'           => '085211223308',
                'email'             => 'maya.indah@smk.edu',
                'alamat'            => 'Ujung Berung Regency, Bandung',
                'status_kepegawaian' => 'PPPK',
                'image'             => 'https://static.wikia.nocookie.net/haikyuu/images/5/56/Yachi_s4-e13-1.png',
            ],
            [
                'nip'               => '199612272022012009',
                'nama_lengkap'      => 'Dini Aminarti, S.Pd.',
                'jenis_kelamin'     => 'Perempuan',
                'tanggal_lahir'     => '1996-12-27',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Bimbingan Konseling',
                'no_telp'           => '081277665509',
                'email'             => 'dini.aminarti@smk.edu',
                'alamat'            => 'Jl. Terusan Jakarta No. 44, Bandung',
                'status_kepegawaian' => 'Honorer',
                'image'             => 'https://static0.dualshockersimages.com/wordpress/wp-content/uploads/2023/07/shoko-personality.jpg?q=50&fit=crop&w=825&dpr=1.5.jpg',
            ],
            [
                'nip'               => '199303282019012010',
                'nama_lengkap'      => 'Didi Suryadi, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1993-03-28',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Kimia',
                'no_telp'           => '082155443310',
                'email'             => 'ani.suryani@smk.edu',
                'alamat'            => 'Pasir Kaliki No. 88, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://static0.cbrimages.com/wordpress/wp-content/uploads/2023/02/jujutsu-kaisen-suguru-geto.jpg',
            ],
            [
                'nip'               => '198512252007011011',
                'nama_lengkap'      => 'Bambang Pamungkas, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1985-12-25',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Waka Kesiswaan',
                'no_telp'           => '081122334411',
                'email'             => 'bambang.p@smk.edu',
                'alamat'            => 'Cibiru Raya No. 101, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://www.mldspot.com/storage/generated/June2021/TulusKonser.jpg',
            ],
            [
                'nip'               => '199006182015011012',
                'nama_lengkap'      => 'Rizky Pratama, S.Pd.',
                'jenis_kelamin'     => 'Laki-Laki',
                'tanggal_lahir'     => '1990-06-18',
                'pendidikan_terakhir' => 'S1',
                'jabatan'           => 'Guru Fisika',
                'no_telp'           => '081299001112',
                'email'             => 'rizky.pratama@smk.edu',
                'alamat'            => 'Baleendah Indah Blok C, Bandung',
                'status_kepegawaian' => 'PNS',
                'image'             => 'https://cdn.antaranews.com/cache/1200x800/2017/11/Kunto_Aji-.jpg',
            ],
        ];

        foreach ($data as $guru) {
            Guru::updateOrCreate(
                ['nip' => $guru['nip']],
                $guru
            );
        }
    }
}
