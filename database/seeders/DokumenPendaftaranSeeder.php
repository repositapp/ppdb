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
                'kk_file' => 'dokumen-file/kk_' . $siswa->id . '.pdf',
                'akta_file' => 'dokumen-file/akta_' . $siswa->id . '.pdf',
                'ijazah_sd_file' => 'dokumen-file/ijazah_sd_' . $siswa->id . '.pdf',
                'ijazah_smp_file' => 'dokumen-file/ijazah_smp_' . $siswa->id . '.pdf',
                'rapor_file' => 'dokumen-file/rapor_' . $siswa->id . '.pdf',
                'foto_file' => 'dokumen-file/foto_' . $siswa->id . '.jpg',
            ]);
        }
    }
}
