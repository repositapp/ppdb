@extends('layouts.master')
@section('title')
    Laporan Pendaftaran
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Laporan
        @endslot
        @slot('li_2')
            Laporan Pendaftaran
        @endslot
        @slot('title')
            Laporan Pendaftaran
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <form method="GET" action="{{ route('laporan.index') }}" class="form-inline">
                    <div class="row align-items-center">
                        <div class="col-md-8 align-items-center">
                            <label>Dari:</label>
                            <input type="date" id="from" name="from" value="{{ request('from') }}"
                                class="form-control input-sm" style="margin-right:15px; margin-left: 5px;">
                            <label>Sampai:</label>
                            <input type="date" id="to" name="to" value="{{ request('to') }}"
                                class="form-control input-sm" style="margin-right:15px; margin-left: 5px;">
                            <label for="status">Status:</label>
                            <select id="status" name="status" class="form-control input-sm"
                                style="margin-right:15px; margin-left: 5px;">
                                <option value="">-- Semua --</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>
                                    Diterima</option>
                                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>

                            <button type="submit" class="btn btn-info btn-sm">
                                <i class="fa fa-search"></i> Tampilkan Data
                            </button>
                        </div>
                        <div class="col-md-4 text-right">
                            <div id="tombol-semua">
                                <a href="{{ route('laporan.cetak') }}" target="_blank" class="btn btn-default btn-sm"><i
                                        class="fa fa-print"></i> Cetak Semua</a>
                                <a href="{{ route('laporan.export-excel') }}" class="btn btn-default btn-sm"><i
                                        class="fa fa-download"></i> Export Semua</a>
                            </div>

                            <div id="tombol-periode" style="display: none;">
                                <a href="{{ route('laporan.cetak', ['from' => request('from'), 'to' => request('to'), 'status' => request('status')]) }}"
                                    target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Cetak
                                    Periode</a>
                                <a href="{{ route('laporan.export-excel', ['from' => request('from'), 'to' => request('to'), 'status' => request('status')]) }}"
                                    class="btn btn-default btn-sm"><i class="fa fa-download"></i> Export Periode</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Pendaftaran</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $siswa)
                            <tr>
                                <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                <td>{{ $siswa->no_pendaftaran }}</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->asal_sekolah }}</td>
                                <td>
                                    @if ($siswa->status == 'diterima')
                                        <span class="label label-success">Diterima</span>
                                    @elseif($siswa->status == 'ditolak')
                                        <span class="label label-danger">Ditolak</span>
                                    @else
                                        <span class="label label-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="box-footer clearfix">
                <div class="pull-left">
                    Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }} data
                </div>
                <div class="pull-right">
                    {{ $data->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let from = document.getElementById('from').value;
            let to = document.getElementById('to').value;
            let status = document.getElementById('status').value;

            if (from && to && status) {
                document.getElementById('tombol-periode').style.display = 'inline-block';
                document.getElementById('tombol-semua').style.display = 'none';
            } else {
                document.getElementById('tombol-periode').style.display = 'none';
                document.getElementById('tombol-semua').style.display = 'inline-block';
            }
        });
    </script>
@endpush
