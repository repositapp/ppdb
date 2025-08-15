<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat; // Pastikan model Chat sudah ada

class MobileViewComposer
{
    public function compose(View $view)
    {
        // 1. Mulai dengan angka 0
        $jumlahPesanBelumDibaca = 0;

        // 2. Jika calon siswa sudah login
        if (Auth::guard('user')->check() && Auth::guard('user')->user()->role === 'siswa') {
            $user = Auth::guard('user')->user();

            // 3. Hitung pesan yang belum dibaca dari admin
            $jumlahPesanBelumDibaca = Chat::where('receiver_id', $user->id)
                ->where('is_read', false)
                ->whereHas('sender', function ($query) {
                    $query->where('role', 'admin'); // Hanya dari admin
                })
                ->count();
        }

        // 4. Kirim hasil perhitungan ke layout
        $view->with('mobileUnreadChatCount', $jumlahPesanBelumDibaca);
    }
}
