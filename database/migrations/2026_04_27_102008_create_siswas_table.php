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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20)->unique();
            $table->string('nisn', 20)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-Laki']);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->string('alamat');
            $table->string('no_telp', 15);
            $table->string('email')->unique();

            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->enum('status', ['Aktif', 'Alumni', 'Pindah', 'Keluar']);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
