@extends('layouts.master')
@section('title')
    Verifikasi Pendaftaran
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            PPDB
        @endslot
        @slot('li_2')
            Verifikasi
        @endslot
        @slot('title')
            Verifikasi Pendaftaran
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <form action="{{ route('verifikasi.index') }}">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama/NISN..."
                            value="{{ request('search') }}">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 40px">No.</th>
                            <th>No. Pendaftaran</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Asal Sekolah</th>
                            <th>Tahun Lulus</th>
                            <th>Status</th>
                            <th>Dokumen</th>
                            <th class="text-center" style="width: 80px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <td class="text-center">{{ $siswa->firstItem() + $loop->index }}</td>
                                <td>{{ $item->no_pendaftaran }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->asal_sekolah }}</td>
                                <td>{{ $item->tahun_lulus }}</td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <span class="label label-warning">Pending</span>
                                    @elseif ($item->status == 'diterima')
                                        <span class="label label-success">Diterima</span>
                                    @else
                                        <span class="label label-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->dokumen)
                                        <a href="{{ route('calonsiswa.show', $item->id) }}"
                                            class="btn btn-xs btn-info">Lihat</a>
                                    @else
                                        <span class="text-muted">Belum diunggah</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->dokumen)
                                        <form action="{{ route('calonsiswa.updateStatus', $item->id) }}" method="POST"
                                            class="form-inline">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control input-sm"
                                                onchange="this.form.submit()">
                                                <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="diterima"
                                                    {{ $item->status == 'diterima' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                            </select>
                                        </form>
                                    @else
                                        <span class="label label-danger">Belum Unggah Dokumen</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data pendaftar baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        Menampilkan
                        {{ $siswa->firstItem() }}
                        hingga
                        {{ $siswa->lastItem() }}
                        dari
                        {{ $siswa->total() }} entri
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            {{ $siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
