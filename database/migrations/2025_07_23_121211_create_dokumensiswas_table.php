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
        Schema::create('dokumensiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calonsiswa_id')->constrained('calonsiswas')->onDelete('cascade');
            $table->string('kk_file')->nullable();
            $table->string('akta_file')->nullable();
            $table->string('ijazah_sd_file')->nullable();
            $table->string('ijazah_smp_file')->nullable();
            $table->string('rapor_file')->nullable();
            $table->string('foto_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumensiswas');
    }
};
