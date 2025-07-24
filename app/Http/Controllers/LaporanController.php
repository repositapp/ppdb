<?php

namespace App\Http\Controllers;

use App\Exports\CalonSiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Aplikasi;
use App\Models\Calonsiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $status = $request->status;

        $data = Calonsiswa::query();

        if ($from && $to) {
            $data->whereBetween('created_at', [$from, $to]);
        }

        if ($status) {
            $data->where('status', $status);
        }

        $data = $data->latest()->paginate(10);

        return view('laporan.index', compact('data', 'from', 'to', 'status'));
    }

    public function cetak($from = null, $to = null, Request $request)
    {
        $status = $request->status;
        $query = Calonsiswa::query();

        if ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $data = $query->get();
        $aplikasi = Aplikasi::first();

        return view('laporan.cetak', compact('data', 'aplikasi', 'from', 'to', 'status'));
    }

    public function exportExcel(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $status = $request->status;

        return Excel::download(new CalonSiswaExport($from, $to, $status), 'laporan_pendaftar.xlsx');
    }

    public function statistik()
    {
        $byStatus = CalonSiswa::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        // Cocokkan key enum sebenarnya
        $byStatusLabeled = collect([
            'Belum Diverifikasi' => (int) ($byStatus['pending'] ?? 0),
            'Diterima' => (int) ($byStatus['diterima'] ?? 0),
            'Ditolak' => (int) ($byStatus['ditolak'] ?? 0),
        ]);

        return view('laporan.statistik', compact('byStatusLabeled'));
    }
}
