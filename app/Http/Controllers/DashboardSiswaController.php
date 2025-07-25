<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardSiswaController extends Controller
{
    public function index(): View
    {
        $pengumumans = Pengumuman::latest()->take(3)
            ->where('status', 1)
            ->get();

        return view('mobile.dashboard', compact('pengumumans'));
    }
}
