@extends('layouts.master')
@section('title')
    Tambah Dokumen
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Master Data
        @endslot
        @slot('li_2')
            Dokumen
        @endslot
        @slot('title')
            Tambah Dokumen
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('dokumen.index') }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('dokumen.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_dokumen" class="col-sm-2 control-label">Nama Dokumen</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_dokumen') is-invalid @enderror"
                                id="nama_dokumen" name="nama_dokumen" value="{{ old('nama_dokumen') }}"
                                placeholder="Nama Dokumen">
                            @error('nama_dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dokumen" class="col-sm-2 control-label">File Dokumen</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen"
                                name="dokumen" placeholder="File Dokumen">
                            <small class="text-danger">Ukuran File Maksimal 1MB</small>
                            @error('dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                            <button type="submit" class="btn btn-social btn-info btn-sm"><i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
