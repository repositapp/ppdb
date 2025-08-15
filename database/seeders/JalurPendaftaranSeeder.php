<?php

namespace Database\Seeders;

use App\Models\JalurPendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jalurs = [
            [
                'nama_jalur' => 'Zonasi',
                'deskripsi' => 'Jalur pendaftaran berdasarkan alamat domisili terdekat dengan sekolah.',
                'aktif' => true
            ],
            [
                'nama_jalur' => 'Prestasi',
                'deskripsi' => 'Jalur pendaftaran berdasarkan prestasi akademik atau non-akademik.',
                'aktif' => true
            ],
            // Tambahkan jalur lain jika diperlukan
        ];

        foreach ($jalurs as $jalur) {
            JalurPendaftaran::firstOrCreate(
                ['nama_jalur' => $jalur['nama_jalur']],
                $jalur
            );
        }
    }
}
