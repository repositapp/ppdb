<?php

namespace App\Http\Controllers;

use App\Models\Calonsiswa;
use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;

class JalurPendaftaranController extends Controller
{
    public function index()
    {
        // Ambil data calon siswa yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        if (!$calonSiswa) {
            return redirect()->route('pendaftaran.create')
                ->with('error', 'Anda harus mendaftar terlebih dahulu.');
        }

        // Ambil semua jalur yang aktif
        $jalurs = JalurPendaftaran::where('aktif', true)->get();

        return view('mobile.jalur.index', compact('jalurs', 'calonSiswa'));
    }

    public function update(Request $request)
    {
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        if (!$calonSiswa) {
            return redirect()->route('pendaftaran.create')
                ->with('error', 'Anda harus mendaftar terlebih dahulu.');
        }

        $validatedData = $request->validate([
            'jalur_pendaftaran_id' => 'required|exists:jalur_pendaftarans,id',
        ]);

        $jalurDipilih = JalurPendaftaran::find($validatedData['jalur_pendaftaran_id']);

        // Jika memilih jalur selain Prestasi, hapus semua prestasi
        if ($jalurDipilih->nama_jalur !== 'Prestasi') {
            $calonSiswa->prestasis()->delete();
        }

        $calonSiswa->update([
            'jalur_pendaftaran_id' => $validatedData['jalur_pendaftaran_id']
        ]);

        $message = "Jalur pendaftaran berhasil diubah menjadi: " . $jalurDipilih->nama_jalur;

        // Jika memilih jalur Prestasi, beri pesan tambahan
        if ($jalurDipilih->nama_jalur === 'Prestasi') {
            $message .= ". Silakan tambahkan prestasi Anda.";
        }

        return redirect()->route('jalur.index')
            ->with('success', $message);
    }
}
