<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-Laki']);
            $table->date('tanggal_lahir');
            $table->enum('pendidikan_terakhir', ['D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('jabatan');
            $table->string('no_telp', 15);
            $table->string('email')->unique();
            $table->string('alamat');
            $table->enum('status_kepegawaian', ['PNS', 'PPPK', 'Honorer', 'Tetap', 'Kontrak']);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
