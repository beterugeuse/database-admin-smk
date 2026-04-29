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
        Schema::table('siswas', function (Blueprint $table) {
            // Check if 'foto' exists before trying to rename it
            if (Schema::hasColumn('siswas', 'foto')) {
                $table->renameColumn('foto', 'image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            // Check if 'image' exists before trying to revert it
            if (Schema::hasColumn('siswas', 'image')) {
                $table->renameColumn('image', 'foto');
            }
        });
    }
};
