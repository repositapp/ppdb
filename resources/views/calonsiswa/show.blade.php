@extends('layouts.master')
@section('title')
    Detail Calon Siswa
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
            Detail Calon Siswa
        @endslot
    @endcomponent

    <section class="content">

        <div class="row">
            <div class="col-md-7">
                <!-- Informasi Utama -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Pribadi</h3>

                        <div class="pull-right box-tools">
                            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-social btn-sm btn-default">
                                <i class="fa fa-reply"></i> Kembali
                            </a>
                        </div>

                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nomor Pendaftaran</th>
                                        <td>{{ $siswa->no_pendaftaran }}</td>
                                    </tr>
                                    <tr>
                                        <th>NISN</th>
                                        <td>{{ $siswa->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $siswa->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $siswa->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <td>
                                            {{ $siswa->tempat_lahir }},
                                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>{{ $siswa->agama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $siswa->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>{{ $siswa->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $siswa->email ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Pendaftaran -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dokumen Pendaftaran</h3>
                    </div>
                    <div class="box-body">
                        @if ($siswa->dokumens)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Kartu Keluarga
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->kk_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->kk_file) }}" target="_blank"
                                                class="btn btn-default btn-xs text-aqua"><i class="fa fa-download"></i>
                                                Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Akta Kelahiran
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->akta_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->akta_file) }}" target="_blank"
                                                class="btn btn-default btn-xs text-aqua"><i class="fa fa-download"></i>
                                                Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Ijazah SD
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->ijazah_sd_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->ijazah_sd_file) }}"
                                                target="_blank" class="btn btn-default btn-xs text-aqua"><i
                                                    class="fa fa-download"></i> Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Ijazah SMP
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->ijazah_smp_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->ijazah_smp_file) }}"
                                                target="_blank" class="btn btn-default btn-xs text-aqua"><i
                                                    class="fa fa-download"></i> Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Raport Siswa
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->rapor_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->rapor_file) }}"
                                                target="_blank" class="btn btn-default btn-xs text-aqua"><i
                                                    class="fa fa-download"></i> Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Pas Foto
                                    <div class="pull-right">
                                        @if ($siswa->dokumens->foto_file)
                                            <a href="{{ asset('storage/' . $siswa->dokumens->foto_file) }}" target="_blank"
                                                class="btn btn-default btn-xs text-aqua"><i class="fa fa-download"></i>
                                                Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        @else
                            <p class="text-center text-muted">Dokumen belum diunggah.</p>
                        @endif
                    </div>
                </div>

                <!-- Prestasi (jika ada) -->
                @if ($siswa->prestasis->count() > 0)
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Prestasi</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Prestasi</th>
                                            <th>Tingkat</th>
                                            <th>Jenis</th>
                                            <th>Tahun</th>
                                            <th>Peringkat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa->prestasis as $prestasi)
                                            <tr>
                                                <td>{{ $prestasi->nama_prestasi }}</td>
                                                <td>{{ $prestasi->tingkat }}</td>
                                                <td>{{ $prestasi->jenis }}</td>
                                                <td>{{ $prestasi->tahun }}</td>
                                                <td>{{ $prestasi->peringkat ?? '-' }}</td>
                                                <td>
                                                    @if ($prestasi->file_bukti)
                                                        <a href="{{ asset('storage/' . $prestasi->file_bukti) }}"
                                                            target="_blank" class="btn btn-xs btn-info">
                                                            <i class="fa fa-file"></i> Lihat File
                                                        </a>
                                                    @else
                                                        <span class="text-muted">Tidak ada file</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-5">
                <!-- Informasi Tambahan -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status & Informasi Tambahan</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 40%;">Status</th>
                                        <td>
                                            @if ($siswa->status == 'pending')
                                                <span class="label label-warning">Pending</span>
                                            @elseif ($siswa->status == 'diterima')
                                                <span class="label label-success">Diterima</span>
                                            @else
                                                <span class="label label-danger">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jalur Pendaftaran</th>
                                        <td>
                                            @if ($siswa->jalurPendaftaran)
                                                <span
                                                    class="label label-primary">{{ $siswa->jalurPendaftaran->nama_jalur }}</span>
                                                @if ($siswa->jalurPendaftaran->deskripsi)
                                                    <p class="text-muted">
                                                        <small>{{ $siswa->jalurPendaftaran->deskripsi }}</small>
                                                    </p>
                                                @endif
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Daftar</th>
                                        <td>{{ \Carbon\Carbon::parse($siswa->created_at)->translatedFormat('l, d F Y, H:i') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diubah</th>
                                        <td>{{ \Carbon\Carbon::parse($siswa->updated_at)->translatedFormat('l, d F Y, H:i') }}
                                        </td>
                                    </tr>
                                    @if ($siswa->user)
                                        <tr>
                                            <th>Akun Pengguna</th>
                                            <td>
                                                <strong>{{ $siswa->user->name }}</strong><br>
                                                <small>{{ $siswa->user->email }}</small>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Data Sekolah -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Sekolah</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Asal Sekolah</th>
                                        <td>{{ $siswa->asal_sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Lulus</th>
                                        <td>{{ $siswa->tahun_lulus }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai UN</th>
                                        <td>{{ $siswa->nilai_un ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai Raport</th>
                                        <td>{{ $siswa->nilai_raport ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Data Orang Tua -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Orang Tua</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Ayah</th>
                                        <td>{{ $siswa->nama_ayah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan Ayah</th>
                                        <td>{{ $siswa->pekerjaan_ayah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <td>{{ $siswa->nama_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan Ibu</th>
                                        <td>{{ $siswa->pekerjaan_ibu }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
