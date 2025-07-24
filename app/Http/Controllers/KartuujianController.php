<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aplikasi;
use App\Models\Calonsiswa;
use Illuminate\Http\Request;

class KartuujianController extends Controller
{
    public function print($id)
    {
        $siswa = Calonsiswa::findOrFail($id);
        $aplikasi = Aplikasi::first();

        return view('laporan.kartu', compact('siswa', 'aplikasi'));
    }
}
