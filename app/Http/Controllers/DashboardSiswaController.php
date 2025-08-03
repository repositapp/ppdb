<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calonsiswa;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardSiswaController extends Controller
{
    public function index(): View
    {
        $user_id = Auth::user()->id ?? null;

        $pengumumans = Pengumuman::latest()->take(3)
            ->where('status', 1)
            ->get();

        $siswa = Calonsiswa::where('user_id', $user_id)->count();

        return view('mobile.dashboard', compact('pengumumans', 'siswa'));
    }
}
