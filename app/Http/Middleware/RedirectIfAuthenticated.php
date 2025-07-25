<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Cek apakah pengguna sudah login di guard tertentu
            if (Auth::guard($guard)->check()) {
                // Jika guard adalah 'web' (untuk admin/petugas)
                if ($guard === 'web') {
                    // Redirect ke dashboard admin (karena admin/petugas sama-sama ke sini)
                    // Anda bisa menyesuaikan dengan RouteServiceProvider::HOME jika itu /panel/dashboard
                    return redirect('/panel/dashboard');
                    // Atau jika ingin lebih fleksibel:
                    // return redirect(RouteServiceProvider::HOME); 
                    // (pastikan RouteServiceProvider::HOME = '/panel/dashboard')
                }

                // Jika guard adalah 'user' (untuk calon siswa/siswa)
                if ($guard === 'user') {
                    $user = Auth::guard('user')->user();

                    // Cek role dan redirect sesuai role
                    if ($user->role === 'siswa') { // Sesuaikan dengan role yang digunakan di database
                        return redirect('/mobile/dashboard'); // Sesuaikan dengan prefix route siswa Anda
                    }
                    // Tambahkan role lain jika diperlukan
                    // elseif ($user->role === 'dosen') {
                    //     return redirect('/dosen/dashboard');
                    // }

                    // Jika role tidak dikenali, redirect ke dashboard default untuk user
                    // atau bisa juga ke halaman tertentu, atau RouteServiceProvider::HOME
                    // Untuk kasus PPDB, asumsi default adalah dashboard calon siswa/siswa
                    return redirect('/mobile/dashboard'); // Sesuaikan
                }
            }
        }

        return $next($request);
    }
}
