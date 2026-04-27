<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['kelas_id', 'mapel_id', 'guru_id', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan'])]

class JadwalPelajaran extends Model
{
    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel(): BelongsTo {
        return $this->belongsTo(Mapel::class);
    }

    public function guru(): BelongsTo {
        return $this->belongsTo(Guru::class);
    }
}
