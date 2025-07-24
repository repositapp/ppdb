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
        Schema::create('kartuujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calonsiswa_id')->constrained()->onDelete('cascade');
            $table->string('no_ujian')->unique();
            $table->date('tanggal_ujian');
            $table->string('lokasi');
            $table->string('ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartuujians');
    }
};
