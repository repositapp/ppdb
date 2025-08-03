<?php

namespace Database\Seeders;

use App\Models\Calonsiswa;
use App\Models\Dokumensiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumenPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calonSiswas = Calonsiswa::all();

        foreach ($calonSiswas as $siswa) {
            Dokumensiswa::create([
                'calonsiswa_id' => $siswa->id,
                'kk_file' => 'dokumen-file/dokumen-1.pdf',
                'akta_file' => 'dokumen-file/dokumen-1.pdf',
                'ijazah_sd_file' => 'dokumen-file/dokumen-1.pdf',
                'ijazah_smp_file' => 'dokumen-file/dokumen-1.pdf',
                'rapor_file' => 'dokumen-file/dokumen-1.pdf',
                'foto_file' => 'dokumen-file/dokumen-1.jpg',
            ]);
        }
    }
}
