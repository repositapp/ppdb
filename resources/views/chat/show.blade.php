@extends('layouts.master')

@section('title')
    Chat dengan {{ $receiver->name }} - Admin Panel
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Chat
        @endslot
        @slot('li_2')
            Chat
        @endslot
        @slot('title')
            Chat dengan {{ $receiver->name }}
        @endslot
    @endcomponent

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Calon Siswa</h3>
                    </div>
                    <div class="box-body" style="max-height: 400px; overflow-y: auto;">
                        <ul class="nav nav-pills nav-stacked">
                            @forelse($latestChats as $chat)
                                @php
                                    // Dapatkan lawan bicara (bukan admin yang sedang login)
                                    $otherUser = $chat->sender_id == auth()->id() ? $chat->receiver : $chat->sender;
                                @endphp
                                <li class="{{ $otherUser->id == $receiver->id ? 'active' : '' }}">
                                    <a href="{{ route('admin.chat.show', $otherUser->id) }}">
                                        <i class="fa fa-user"></i> {{ $otherUser->name }}
                                        @if ($chat->sender_id != auth()->id() && !$chat->is_read)
                                            <span class="label label-primary pull-right">Baru</span>
                                        @endif
                                        <p class="text-muted">{{ Str::limit($chat->message, 30) }}</p>
                                    </a>
                                </li>
                            @empty
                                <li class="text-center">Tidak ada percakapan</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Broadcast Pesan</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.chat.broadcast-all') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="broadcast_message">Pesan ke Semua Calon Siswa:</label>
                                <textarea name="message" id="broadcast_message" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Kirim ke Semua</button>
                        </form>

                        <hr>

                        <form action="{{ route('admin.chat.broadcast') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="selected_message">Pesan ke Calon Siswa Terpilih:</label>
                                <textarea name="message" id="selected_message" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pilih Calon Siswa:</label>
                                <select name="receiver_ids[]" class="form-control select2" multiple="multiple"
                                    data-placeholder="Pilih calon siswa" style="width: 100%;">
                                    @foreach ($calonSiswas as $calonSiswa)
                                        <option value="{{ $calonSiswa->user->id }}">{{ $calonSiswa->user->name }}
                                            ({{ $calonSiswa->no_pendaftaran }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Kirim ke Terpilih</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Percakapan dengan {{ $receiver->name }}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.chat.index') }}" class="btn btn-box-tool" title="Kembali ke daftar">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="direct-chat-messages" id="chat-messages" style="height: 500px;">
                            @foreach ($chats as $chat)
                                @if ($chat->sender_id == auth()->id())
                                    <!-- Pesan dari admin -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">{{ $chat->sender->name }}</span>
                                            <span
                                                class="direct-chat-timestamp pull-left">{{ $chat->created_at->format('d M Y H:i') }}</span>
                                        </div>
                                        <img class="direct-chat-img" src="{{ asset('storage/' . $chat->sender->avatar) }}"
                                            alt="message user image">
                                        <div class="direct-chat-text">
                                            {{ $chat->message }}
                                        </div>
                                    </div>
                                @else
                                    <!-- Pesan dari calon siswa -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">{{ $chat->sender->name }}</span>
                                            <span
                                                class="direct-chat-timestamp pull-right">{{ $chat->created_at->format('d M Y H:i') }}</span>
                                        </div>
                                        <img class="direct-chat-img" src="{{ asset('storage/' . $chat->sender->avatar) }}"
                                            alt="message user image">
                                        <div class="direct-chat-text">
                                            {{ $chat->message }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="box-footer">
                        <form action="{{ route('admin.chat.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Ketik pesan ..." class="form-control"
                                    required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-flat">Kirim</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Scroll ke pesan terakhir
        $(document).ready(function() {
            var chatMessages = $('#chat-messages');
            chatMessages.scrollTop(chatMessages[0].scrollHeight);
        });
    </script>
@endpush
