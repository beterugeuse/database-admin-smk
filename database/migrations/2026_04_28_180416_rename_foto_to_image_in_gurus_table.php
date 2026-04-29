<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $blueprint) {
            // Only attempt rename if 'foto' exists AND 'image' does NOT exist
            if (Schema::hasColumn('gurus', 'foto') && !Schema::hasColumn('gurus', 'image')) {
                $blueprint->renameColumn('foto', 'image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $blueprint) {
            if (Schema::hasColumn('gurus', 'image') && !Schema::hasColumn('gurus', 'foto')) {
                $blueprint->renameColumn('image', 'foto');
            }
        });
    }
};
