@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Edit Data SKPI</h1>

        <div class="text-right mb-3">
            <button type="submit" class="btn btn-primary float-left">Simpan</button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mx-auto">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-center">
                                Nama Lengkap </label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ?? $user->biodata->nama ?? '' }}" autofocus>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nim" class="col-md-4 col-form-label text-md-center">
                                NIM </label>
                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') ?? $user->nim ?? '' }}" autofocus>
                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('admin.home')}}" class="btn btn-primary btn shadow-none">
                                    <i class="fas fa-arrow-left" title="tambah"></i>
                                </a>
                                <button type="submit" class="btn btn-success btn shadow-none">
                                    <i class="fas fa-save" title="save"></i></button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection