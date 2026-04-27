<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;


#[Fillable(['nama_kelas', 'tingkat', 'tahun_ajaran', 'jurusan_id', 'wali_kelas_id', 'kapasitas'])]

class Kelas extends Model
{
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function waliKelas(): BelongsTo
    {
        // Kita beri nama 'waliKelas' tapi tetap mengarah ke model Guru
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
}
