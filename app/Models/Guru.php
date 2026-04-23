<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nip', 'nama', 'telepon', 'alamat'])]

class Guru extends Model
{
    ///** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;
    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class, 'guru_id');
    }
}


