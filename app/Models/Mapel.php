<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['kode_mapel', 'nama_mapel', 'jam_pelajaran', 'jurusan_id'])]

class Mapel extends Model
{
    use HasFactory;

    public function jurusan(): BelongsTo
    {
        // Laravel akan otomatis mencari 'jurusan_id' sebagai FK
        return $this->belongsTo(Jurusan::class);
    }
}
