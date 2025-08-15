<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calonsiswa;
use App\Models\JalurPendaftaran;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        // Ambil data calon siswa yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        if (!$calonSiswa) {
            return redirect()->route('pendaftaran.create')
                ->with('error', 'Anda harus mendaftar terlebih dahulu.');
        }

        $prestasis = $calonSiswa->prestasis;
        return view('mobile.prestasi.index', compact('prestasis', 'calonSiswa'));
    }

    public function create()
    {
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        if (!$calonSiswa) {
            return redirect()->route('pendaftaran.create')
                ->with('error', 'Anda harus mendaftar terlebih dahulu.');
        }

        // Cek apakah sudah memilih jalur prestasi
        $jalurPrestasi = JalurPendaftaran::where('nama_jalur', 'Prestasi')->first();
        if ($calonSiswa->jalur_pendaftaran_id != $jalurPrestasi?->id) {
            return redirect()->route('jalur.index')
                ->with('error', 'Anda harus memilih jalur Prestasi terlebih dahulu.');
        }

        return view('mobile.prestasi.create');
    }

    public function store(Request $request)
    {
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        if (!$calonSiswa) {
            return redirect()->route('pendaftaran.create')
                ->with('error', 'Anda harus mendaftar terlebih dahulu.');
        }

        $validatedData = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|in:Sekolah,Kecamatan,Kabupaten,Provinsi,Nasional,Internasional',
            'jenis' => 'required|in:Akademik,Non-Akademik',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'penyelenggara' => 'required|string|max:255',
            'peringkat' => 'nullable|string|max:50',
            'file_bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Max 5MB
        ]);

        $validatedData['calonsiswa_id'] = $calonSiswa->id;

        if ($request->hasFile('file_bukti')) {
            $path = $request->file('file_bukti')->store('prestasi/' . $calonSiswa->id, 'public');
            $validatedData['file_bukti'] = $path;
        }

        Prestasi::create($validatedData);

        return redirect()->route('prestasi.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        // Pastikan prestasi milik calon siswa yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();
        if ($prestasi->calonsiswa_id != $calonSiswa->id) {
            abort(403);
        }

        return view('mobile.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        // Pastikan prestasi milik calon siswa yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();
        if ($prestasi->calonsiswa_id != $calonSiswa->id) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|in:Sekolah,Kecamatan,Kabupaten,Provinsi,Nasional,Internasional',
            'jenis' => 'required|in:Akademik,Non-Akademik',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'penyelenggara' => 'required|string|max:255',
            'peringkat' => 'nullable|string|max:50',
            'file_bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Max 5MB
        ]);

        if ($request->hasFile('file_bukti')) {
            // Hapus file lama jika ada
            if ($prestasi->file_bukti) {
                Storage::disk('public')->delete($prestasi->file_bukti);
            }
            $path = $request->file('file_bukti')->store('prestasi/' . $calonSiswa->id, 'public');
            $validatedData['file_bukti'] = $path;
        }

        $prestasi->update($validatedData);

        return redirect()->route('prestasi.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        // Pastikan prestasi milik calon siswa yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();
        if ($prestasi->calonsiswa_id != $calonSiswa->id) {
            abort(403);
        }

        // Hapus file jika ada
        if ($prestasi->file_bukti) {
            Storage::disk('public')->delete($prestasi->file_bukti);
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}
