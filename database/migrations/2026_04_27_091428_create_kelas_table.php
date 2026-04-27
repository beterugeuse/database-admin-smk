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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->tinyInteger('tingkat');
            $table->string('tahun_ajaran', 10);

            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');

            $table->foreignId('wali_kelas_id')->constrained('gurus')->onDelete('cascade');

            $table->tinyInteger('kapasitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
