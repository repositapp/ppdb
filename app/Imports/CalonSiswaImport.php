<?php

namespace App\Imports;

use App\Models\CalonSiswa;
use App\Models\Dokumensiswa;
use App\Models\JalurPendaftaran;
use App\Models\Prestasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CalonSiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // 1. Buat user otomatis
        $user = User::create([
            'name'      => $row['nama_lengkap'],
            'username'  => $row['nisn'],
            'email'     => $row['email'] ?? $row['nisn'] . '_' . $row['nama_lengkap'] . '@mail.com',
            'password'  => Hash::make('12345678'),
            'role'      => 'siswa',
        ]);

        // 2. Cek jalur pendaftaran
        // $jalur = null;
        // if (!empty($row['jalur_pendaftaran'])) {
        //     $jalur = JalurPendaftaran::firstOrCreate(
        //         ['nama_jalur' => $row['jalur_pendaftaran']],
        //         ['deskripsi' => null, 'aktif' => true]
        //     );
        // }

        // 3. Insert calon siswa
        $calon = CalonSiswa::create([
            'user_id'               => $user->id,
            'no_pendaftaran'        => $row['no_pendaftaran'],
            'nama_lengkap'          => $row['nama_lengkap'],
            'nisn'                  => $row['nisn'],
            'nik'                   => $row['nik'],
            'tempat_lahir'          => $row['tempat_lahir'],
            'tanggal_lahir'         => Carbon::parse($row['tanggal_lahir']),
            'jenis_kelamin'         => $row['jenis_kelamin'],
            'agama'                 => $row['agama'],
            'alamat'                => $row['alamat'],
            'no_hp'                 => $row['no_hp'],
            'email'                 => $row['email'] ?? $row['nisn'] . '_' . $row['nama_lengkap'] . '@mail.com',
            'asal_sekolah'          => $row['asal_sekolah'],
            'tahun_lulus'           => $row['tahun_lulus'],
            'nama_ayah'             => $row['nama_ayah'],
            'nama_ibu'              => $row['nama_ibu'],
            'pekerjaan_ayah'        => $row['pekerjaan_ayah'],
            'pekerjaan_ibu'         => $row['pekerjaan_ibu'],
            'nilai_un'              => $row['nilai_un'] ?? null,
            'nilai_raport'          => $row['nilai_raport'] ?? null,
            'status'                => 'pending',
            // 'jalur_pendaftaran_id'  => $jalur ? $jalur->id : null,
            'jalur_pendaftaran_id'  => 1,
        ]);

        // 4. Insert dokumen siswa (masih kosong/null dulu)
        Dokumensiswa::create([
            'calonsiswa_id' => $calon->id,
            'kk_file' => 'dokumen-file/dokumen-1.pdf',
            'akta_file' => 'dokumen-file/dokumen-1.pdf',
            'ijazah_sd_file' => 'dokumen-file/dokumen-1.pdf',
            'ijazah_smp_file' => 'dokumen-file/dokumen-1.pdf',
            'rapor_file' => 'dokumen-file/dokumen-1.pdf',
            'foto_file' => 'dokumen-file/dokumen-1.jpg',
        ]);

        // 5. Jika jalurnya prestasi, buat data prestasi
        // if (isset($row['jalur_pendaftaran']) && strtolower($row['jalur_pendaftaran']) == 'prestasi') {
        //     Prestasi::create([
        //         'calonsiswa_id' => $calon->id,
        //         'nama_prestasi' => $row['nama_prestasi'] ?? '-',
        //         'tingkat'       => $row['tingkat'] ?? 'Sekolah',
        //         'jenis'         => $row['jenis'] ?? 'Non-Akademik',
        //         'tahun'         => $row['tahun_prestasi'] ?? date('Y'),
        //         'penyelenggara' => $row['penyelenggara'] ?? '-',
        //         'peringkat'     => $row['peringkat'] ?? null,
        //         'file_bukti'    => null,
        //     ]);
        // }

        return $calon;
    }
}
