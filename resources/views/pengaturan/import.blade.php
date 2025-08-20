@extends('layouts.master')
@section('title')
    Import Siswa
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pengaturan
        @endslot
        @slot('li_2')
            Import Siswa
        @endslot
        @slot('title')
            Import Siswa
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Import Data</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('import.calon-siswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file" class="col-sm-2 control-label">Pilih File Excel:</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                                name="file" placeholder="Import Data">
                            <small class="text-danger">Ukuran File Maksimal 2MB</small>
                            <p></p>
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                            <button type="submit" class="btn btn-social btn-info btn-sm"><i class="fa fa-save"></i>
                                Import Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
