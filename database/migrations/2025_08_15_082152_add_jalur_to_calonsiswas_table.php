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
        Schema::table('calonsiswas', function (Blueprint $table) {
            $table->foreignId('jalur_pendaftaran_id')->nullable()->constrained('jalur_pendaftarans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calonsiswas', function (Blueprint $table) {
            $table->dropForeign(['jalur_pendaftaran_id']);
            $table->dropColumn('jalur_pendaftaran_id');
        });
    }
};
