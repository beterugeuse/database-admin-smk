<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nis', 'nama', 'kelas', 'jurusan', 'alamat'])]
class Siswa extends Model
{
    ///** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;
}
