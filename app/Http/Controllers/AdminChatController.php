<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calonsiswa;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index()
    {
        // Ambil semua calon siswa untuk dropdown
        $calonSiswas = Calonsiswa::with('user')->get();

        // Ambil pesan terbaru dari setiap calon siswa
        $latestChats = Chat::with(['sender', 'receiver'])
            ->where(function ($query) {
                $query->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) {
                return $item->sender_id == auth()->id() ? $item->receiver_id : $item->sender_id;
            })
            ->sortByDesc('created_at');

        return view('chat.index', compact('calonSiswas', 'latestChats'));
    }

    public function show($receiverId)
    {
        // Ambil semua calon siswa untuk dropdown
        $calonSiswas = CalonSiswa::with('user')->get();

        // Ambil user penerima
        $receiver = User::findOrFail($receiverId);

        // Ambil semua pesan antara admin dan penerima
        $chats = Chat::with(['sender', 'receiver'])
            ->where(function ($query) use ($receiverId) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $receiverId);
            })
            ->orWhere(function ($query) use ($receiverId) {
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Tandai pesan sebagai sudah dibaca
        Chat::where('sender_id', $receiverId)
            ->where('receiver_id', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Ambil pesan terbaru dari setiap calon siswa untuk sidebar
        $latestChats = Chat::with(['sender', 'receiver'])
            ->where(function ($query) {
                $query->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) {
                return $item->sender_id == auth()->id() ? $item->receiver_id : $item->sender_id;
            })
            ->sortByDesc('created_at');

        return view('chat.show', compact('calonSiswas', 'chats', 'receiver', 'latestChats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000'
        ]);

        $validatedData['sender_id'] = auth()->id();
        $validatedData['is_read'] = false;

        Chat::create($validatedData);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    public function broadcast(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:1000',
            'receiver_ids' => 'required|array',
            'receiver_ids.*' => 'exists:users,id'
        ]);

        foreach ($validatedData['receiver_ids'] as $receiverId) {
            Chat::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $receiverId,
                'message' => $validatedData['message'],
                'is_read' => false,
                'is_broadcast' => true
            ]);
        }

        return redirect()->back()->with('success', 'Pesan broadcast berhasil dikirim.');
    }

    public function broadcastAll(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        // Ambil semua calon siswa (user dengan role 'siswa')
        $calonSiswas = User::where('role', 'siswa')->get();

        foreach ($calonSiswas as $user) {
            Chat::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $user->id,
                'message' => $validatedData['message'],
                'is_read' => false,
                'is_broadcast' => true
            ]);
        }

        return redirect()->back()->with('success', 'Pesan broadcast ke semua calon siswa berhasil dikirim.');
    }
}
