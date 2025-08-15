<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class UserChatController extends Controller
{
    public function index()
    {
        // Ambil semua pesan antara calon siswa dan admin
        $chats = Chat::with(['sender', 'receiver'])
            ->where(function ($query) {
                $query->where('sender_id', auth()->id())
                    ->whereHas('receiver', function ($q) {
                        $q->where('role', 'admin');
                    });
            })
            ->orWhere(function ($query) {
                $query->where('receiver_id', auth()->id())
                    ->whereHas('sender', function ($q) {
                        $q->where('role', 'admin');
                    });
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Tandai pesan dari admin sebagai sudah dibaca
        Chat::where('receiver_id', auth()->id())
            ->whereHas('sender', function ($q) {
                $q->where('role', 'admin');
            })
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Ambil admin (asumsi hanya ada satu admin untuk chat, atau ambil admin pertama)
        $admin = User::where('role', 'admin')->first();

        return view('mobile.chat.index', compact('chats', 'admin'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        // Ambil admin (asumsi hanya ada satu admin untuk chat, atau ambil admin pertama)
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $admin->id,
            'message' => $validatedData['message'],
            'is_read' => false
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }
}
