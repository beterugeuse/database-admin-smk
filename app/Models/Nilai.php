<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'siswa_id', 'mapel_id', 'guru_id',
    'semester', 'nilai_uts', 'nilai_uas', 'nilai_akhir'
])]

class Nilai extends Model
{
    // relasi ke tabel siswa
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    // relasi ke tabel matapelajaran
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class);
    }

    // relasi ke tabel guru
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
}
