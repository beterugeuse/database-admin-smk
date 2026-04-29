<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nip',
    'nama_lengkap',
    'jenis_kelamin',
    'tanggal_lahir',
    'pendidikan_terakhir',
    'jabatan',
    'no_telp',
    'email',
    'alamat',
    'status_kepegawaian',
    'image'
])]
class Guru extends Model
{
    use HasFactory;

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/gurus/' . $image),
        );
    }

    public function kelasWali(): HasMany
    {
        // wali_kelas_id karena itu nama kolom di tabel kelas
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }
}
