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

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Detail Calon Siswa</h3>

                <div class="pull-right box-tools">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-information">
                    <table>
                        <tr>
                            <td style="width: 150px">Nomor Pendaftaran</td>
                            <td>: {{ $siswa->no_pendaftaran }}</td>
                            <td style="width: 150px">Status</td>
                            <td>:
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
                            <td style="width: 150px">NISN</td>
                            <td>: {{ $siswa->nisn }}</td>
                            <td style="width: 150px">Asal Sekolah</td>
                            <td>: {{ $siswa->asal_sekolah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Nama Siswa</td>
                            <td>: {{ $siswa->nama_lengkap }}</td>
                            <td style="width: 150px">Tahun Lulus</td>
                            <td>: {{ $siswa->tahun_lulus }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">NIK</td>
                            <td>: {{ $siswa->nik }}</td>
                            <td style="width: 150px">Nilai UN</td>
                            <td>: {{ $siswa->nilai_un }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Tempat Lahir</td>
                            <td>: {{ $siswa->tempat_lahir }}</td>
                            <td style="width: 150px">Nilai Raport</td>
                            <td>: {{ $siswa->nilai_raport }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Tanggal Lahir</td>
                            <td>:
                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                            </td>
                            <td style="width: 150px">Nama Ayah</td>
                            <td>: {{ $siswa->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Jenis Kelamin</td>
                            <td>: {{ $siswa->jenis_kelamin }}</td>
                            <td style="width: 150px">Nama Ibu</td>
                            <td>: {{ $siswa->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Agama</td>
                            <td>: {{ $siswa->agama }}</td>
                            <td style="width: 150px">Nomor Telepon</td>
                            <td>: {{ $siswa->no_hp }}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px">Alamat</td>
                            <td>: {{ $siswa->alamat }}</td>
                            <td style="width: 150px">Email</td>
                            <td>: {{ $siswa->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Dokumen Pendaftaran</h3>
            </div>
            <div class="box-body">
                <div class="table-information">
                    <table>
                        @if ($siswa->dokumen)
                            <tr>
                                <td style="width: 150px">Kartu Keluarga</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->kk_file) }}" target="_blank"
                                        class="btn btn-default btn-sm text-aqua" style="margin-left: 10px"><i
                                            class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Akta Kelahiran</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->akta_file) }}" target="_blank"
                                        class="btn btn-default btn-sm text-aqua" style="margin-left: 10px"><i
                                            class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Ijazah SD</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->ijazah_sd_file) }}"
                                        target="_blank" class="btn btn-default btn-sm text-aqua"
                                        style="margin-left: 10px"><i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Ijazah SMP</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->ijazah_smp_file) }}"
                                        target="_blank" class="btn btn-default btn-sm text-aqua"
                                        style="margin-left: 10px"><i class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Raport Siswa</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->rapor_file) }}" target="_blank"
                                        class="btn btn-default btn-sm text-aqua" style="margin-left: 10px"><i
                                            class="fa fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Pas Foto</td>
                                <td>:
                                    <a href="{{ asset('dokumen-file/' . $siswa->dokumens->foto_file) }}" target="_blank"
                                        class="btn btn-default btn-sm text-aqua" style="margin-left: 10px"><i
                                            class="fa fa-download"></i></a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="2" class="text-center">Dokumen belum diunggah.
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
