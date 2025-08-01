<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calonsiswa;
use App\Models\Dokumensiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonsiswaController extends Controller
{
    public function index()
    {
        $siswa = Calonsiswa::with('dokumens')->whereNot('status', 'pending');

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
        $siswa = Calonsiswa::with('dokumens')->where('status', 'pending');

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
        $siswa = Calonsiswa::with('dokumens')->findOrFail($id);
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

    public function pendaftaran(Request $request)
    {
        // Cari calon siswa berdasarkan user_id dari pengguna yang login
        $calonSiswa = Calonsiswa::where('user_id', auth()->id())->first();

        return view('mobile.pendaftaran', compact('calonSiswa'));
    }

    public function detail($id)
    {
        // Ambil data calon siswa berdasarkan ID
        $calonSiswa = Calonsiswa::with('dokumens')->findOrFail($id);
        $tanggalFormatted = Carbon::parse($calonSiswa->tanggal_lahir)->format('m/d/Y');

        return view('mobile.pendaftaran-detail', compact('calonSiswa', 'tanggalFormatted'));
    }

    public function create()
    {
        return view('mobile.pendaftaran-create');
    }

    public function edit($id)
    {
        // Ambil data calon siswa berdasarkan ID
        $calonSiswa = Calonsiswa::findOrFail($id);
        $tanggalFormatted = Carbon::parse($calonSiswa->tanggal_lahir)->format('m/d/Y');

        return view('mobile.pendaftaran-edit', compact('calonSiswa', 'tanggalFormatted'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:calonsiswas',
            'nik' => 'required|string|max:20|unique:calonsiswas',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255|unique:calonsiswas',
            'asal_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:2400',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'nilai_un' => 'nullable|numeric|min:0|max:100',
            'nilai_raport' => 'nullable|numeric|min:0|max:100',
        ]);

        $today = Carbon::today();
        $year = $today->year;
        $month = str_pad($today->month, 2, '0', STR_PAD_LEFT);
        $day = str_pad($today->day, 2, '0', STR_PAD_LEFT);

        $lastSiswa = CalonSiswa::whereDate('created_at', $today)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastSiswa) {
            $lastNumberPart = substr($lastSiswa->no_pendaftaran, -3);
            $newNumber = str_pad((int)$lastNumberPart + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        $nomorPendaftaran = "{$year}.{$month}.{$day}.{$newNumber}";

        $validatedData['no_pendaftaran'] = $nomorPendaftaran;
        if ($request->tanggal_lahir) {
            $validatedData['tanggal_lahir'] = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        }
        $validatedData['user_id'] = auth()->id();

        // Simpan data calon siswa
        $calonSiswa = Calonsiswa::create($validatedData);

        // Validasi dokumen (upload file)
        $dokumenValidated = $request->validate([
            'foto_file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
            'kk_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'akta_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'ijazah_sd_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'ijazah_smp_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'rapor_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
        ]);

        // Simpan dokumen ke storage
        $dokumenData = [];
        foreach ($dokumenValidated as $field => $file) {
            if ($file) {
                $path = $file->store('dokumen-file/' . $calonSiswa->id, 'public');
                $dokumenData[$field] = $path;
            }
        }

        // Simpan data dokumen calon siswa
        $calonSiswa->dokumens()->create($dokumenData);

        // Redirect setelah berhasil
        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil! Mohon tunggu konfirmasi dari admin.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data calon siswa
        $validatedData = $request->validate([
            // Bisa juga menggunakan 'required' jika field ini wajib diisi
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:calonsiswas,nisn,' . $id,
            'nik' => 'required|string|max:20|unique:calonsiswas,nik,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255|unique:calonsiswas,email,' . $id,
            'asal_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Tahun lulus tidak lebih dari tahun depan
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'nilai_un' => 'nullable|numeric|min:0|max:100',
            'nilai_raport' => 'nullable|numeric|min:0|max:100',
        ], [
            // Pesan error kustom (opsional)
            'nisn.unique' => 'NISN ini sudah digunakan oleh pendaftar lain.',
            'nik.unique' => 'NIK ini sudah digunakan oleh pendaftar lain.',
            'email.unique' => 'Email ini sudah digunakan oleh pendaftar lain.',
            'no_pendaftaran.unique' => 'Nomor pendaftaran ini sudah digunakan.',
        ]);

        // Validasi dokumen (upload file) - tidak wajib, hanya jika diupload ulang
        $dokumenValidated = $request->validate([
            'foto_file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
            'kk_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'akta_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'ijazah_sd_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'ijazah_smp_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
            'rapor_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5000', // Maksimal 5MB
        ]);

        if ($request->tanggal_lahir) {
            $validatedData['tanggal_lahir'] = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        }

        // Temukan data calon siswa
        $calonSiswa = Calonsiswa::findOrFail($id);

        // Periksa apakah user yang login adalah pemilik data ini
        // (Opsional tapi penting untuk keamanan)
        if ($calonSiswa->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Update data calon siswa
        $calonSiswa->update($validatedData);

        // Update dokumen jika ada file baru yang diupload
        $dokumenSiswa = $calonSiswa->dokumens; // Relasi one-to-one
        if (!$dokumenSiswa) {
            // Jika belum ada dokumen, buat baru
            $dokumenSiswa = new Dokumensiswa(['calonsiswa_id' => $calonSiswa->id]);
        }

        $dokumenDataToUpdate = [];
        foreach ($dokumenValidated as $field => $file) {
            if ($file) {
                // Hapus file lama jika ada
                if ($dokumenSiswa->$field) {
                    Storage::disk('public')->delete($dokumenSiswa->$field);
                }
                // Simpan file baru
                $path = $file->store('dokumen/' . $calonSiswa->id, 'public');
                $dokumenDataToUpdate[$field] = $path;
            }
        }

        if (!empty($dokumenDataToUpdate)) {
            // Jika dokumenSiswa belum ada, create. Jika sudah ada, update.
            if ($dokumenSiswa->exists) {
                $dokumenSiswa->update($dokumenDataToUpdate);
            } else {
                // Tambahkan data lain jika perlu, misal calonsiswa_id
                $dokumenDataToUpdate['calonsiswa_id'] = $calonSiswa->id;
                Dokumensiswa::create($dokumenDataToUpdate);
            }
        }


        // Redirect dengan pesan sukses
        return redirect()->route('pendaftaran.detail', $calonSiswa->id)
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }
}
