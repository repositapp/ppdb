<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calonsiswa;
use Illuminate\Http\Request;

class CalonsiswaController extends Controller
{
    public function index()
    {
        $siswa = Calonsiswa::with('dokumen')->whereNot('status', 'pending');

        $search = request('search');
        if ($search) {
            $siswa->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('no_pendaftaran', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
        }

        $siswa = $siswa->latest()->paginate(10)->appends(['search' => $search]);

        return view('calonsiswa.index', compact('siswa', 'search'));
    }

    public function verifikasi()
    {
        $siswa = Calonsiswa::with('dokumen')->where('status', 'pending');

        $search = request('search');
        if ($search) {
            $siswa->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('no_pendaftaran', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%');
        }

        $siswa = $siswa->latest()->paginate(10)->appends(['search' => $search]);

        return view('calonsiswa.verifikasi', compact('siswa', 'search'));
    }

    public function show($id)
    {
        $siswa = Calonsiswa::with('dokumen')->findOrFail($id);
        return view('calonsiswa.show', compact('siswa'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $siswa = Calonsiswa::findOrFail($id);
        $siswa->status = $request->status;
        $siswa->save();

        return redirect()->route('verifikasi.index')->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
