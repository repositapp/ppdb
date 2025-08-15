@extends('layouts.mobile')

@section('title', 'Chat dengan Admin')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <!-- Konten Utama -->
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Chat dengan Admin</h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-md">
                    <i class="las la-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-md">
                    <i class="las la-exclamation-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif

            <div class="bg-gray-100 rounded-lg p-4 mb-4" style="height: 500px; overflow-y: auto;" id="chat-messages">
                @forelse($chats as $chat)
                    @if ($chat->sender_id == auth()->id())
                        <!-- Pesan dari calon siswa -->
                        <div class="flex justify-end mb-4">
                            <div class="bg-blue-500 text-white rounded-lg p-3 max-w-xs md:max-w-md">
                                <p>{{ $chat->message }}</p>
                                <p class="text-xs text-blue-100 mt-1">{{ $chat->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    @else
                        <!-- Pesan dari admin -->
                        <div class="flex justify-start mb-4">
                            <div class="bg-gray-300 rounded-lg p-3 max-w-xs md:max-w-md">
                                <p>{{ $chat->message }}</p>
                                <p class="text-xs text-gray-600 mt-1">{{ $chat->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center text-gray-500 py-8">
                        <i class="las la-comments text-4xl mb-2"></i>
                        <p>Belum ada percakapan. Kirim pesan untuk memulai chat dengan admin.</p>
                    </div>
                @endforelse
            </div>

            <form action="{{ route('user.chat.store') }}" method="POST">
                @csrf
                <div class="flex">
                    <input type="text" name="message" placeholder="Ketik pesan Anda..."
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md">
                        <i class="las la-paper-plane"></i> Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Scroll ke pesan terakhir
        document.addEventListener('DOMContentLoaded', function() {
            var chatMessages = document.getElementById('chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    </script>
@endsection
