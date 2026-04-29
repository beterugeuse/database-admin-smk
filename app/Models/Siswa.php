<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;


#[Fillable([
    'nis',
    'nisn',
    'nama_lengkap',
    'jenis_kelamin',
    'tanggal_lahir',
    'agama',
    'alamat',
    'no_telp',
    'email',
    'kelas_id',
    'status',
    'image'
])]
class Siswa extends Model
{
    use HasFactory;

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/siswas/' . $image),
        );
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }


}
