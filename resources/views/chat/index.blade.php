@extends('layouts.master')

@section('title')
    Chat - Admin Panel
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
            Chat
        @endslot
    @endcomponent

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Calon Siswa</h3>
                    </div>
                    <div class="box-body" style="max-height: 400px; overflow-y: auto;"> <!-- Tambahkan style di sini -->
                        <ul class="nav nav-pills nav-stacked">
                            @forelse($latestChats as $chat)
                                @php
                                    $otherUser = $chat->sender_id == auth()->id() ? $chat->receiver : $chat->sender;
                                @endphp
                                <li>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Selamat Datang di Chat Admin</h3>
                    </div>
                    <div class="box-body">
                        <p>Silakan pilih calon siswa dari daftar di sebelah kiri untuk memulai percakapan.</p>
                        <p>Anda juga dapat mengirim pesan broadcast ke semua calon siswa atau calon siswa terpilih
                            menggunakan form di sebelah kiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('build/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('script')
    <!-- Select2 -->
    <script src="{{ URL::asset('build/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endpush
