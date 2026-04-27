<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['kode_jurusan', 'nama_jurusan', 'deskripsi'])]

class Jurusan extends Model
{
    use HasFactory;

    public function mapels(): HasMany
    {
        return $this->hasMany(Mapel::class);
    }

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'jurusan_id');
    }
}
