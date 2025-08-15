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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calonsiswa_id')->constrained('calonsiswas')->onDelete('cascade');
            $table->string('nama_prestasi');
            $table->string('tingkat'); // Sekolah, Kecamatan, Kabupaten, Provinsi, Nasional, Internasional
            $table->string('jenis'); // Akademik, Non-Akademik
            $table->year('tahun');
            $table->string('penyelenggara');
            $table->string('peringkat')->nullable();
            $table->string('file_bukti')->nullable(); // Untuk sertifikat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
