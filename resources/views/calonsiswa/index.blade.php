@extends('layouts.master')
@section('title')
    Calon Siswa
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            PPDB
        @endslot
        @slot('li_2')
            Calon Siswa
        @endslot
        @slot('title')
            Calon Siswa
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <form action="{{ route('calonsiswa.index') }}">
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
                            <th>Jalur Pendaftaran</th>
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
                                <td>{{ $item->jalurPendaftaran->nama_jalur ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'diterima')
                                        <span class="label label-success">Diterima</span>
                                    @elseif ($item->status == 'ditolak')
                                        <span class="label label-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td><span class="label label-success">Sudah diunggah</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('calonsiswa.show', $item->id) }}"
                                            class="btn btn-default btn-sm text-aqua"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data calon siswa yang telah diverifikasi.
                                </td>
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
