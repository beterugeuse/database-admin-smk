<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['mata_pelajaran', 'jurusan', 'guru_id'])]
class MataPelajaran extends Model
{
    ///** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
