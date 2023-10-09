    @extends('layouts.app')

    @section('content')

    <div class="container">

        <div class="card mx-auto mb-3">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Bukti Prestasi</h6>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('buktiPrestasis.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$id}}">

                    <div class="form-group row">
                        <label for="namaPrestasi" class="col-md-3 col-form-label text-md-right">Nama Prestasi</label>
                        <div class="col-md-6">
                            <input id="namaPrestasi" type="text" class="form-control col-md-8 @error('nama_prestasi') is-invalid @enderror" name="nama_prestasi" value="{{ old('nama_prestasi') }}" required autofocus>
                            @error('nama_prestasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="kategoriPrestasi" class="col-md-3 col-form-label text-md-right">Kategori</label>
                        <div class="col-md-6">
                            <select id="kategoriPrestasi" class="form-control col-md-8 @error('kategori') is-invalid @enderror" name="kategori" required>
                                <option value="Pelatihan">Pelatihan</option>
                                <option value="Penhargaan">Penhargaan</option>
                                <option value="Organisasi">Organisasi</option>
                                <option value="Magang">Magang</option>
                                <option value="Seminar">Seminar</option>
                                <option value="Skripsi">Skripsi</option>
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="filePrestasi" class="col-md-3 col-form-label text-md-right">File Bukti</label>
                        <div class="col-md-6">
                            <input id="filePrestasi" type="file" class="form-control-file col-md-8 @error('file') is-invalid @enderror" name="file" required>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button onclick="window.history.back()" class="btn btn-primary btn shadow-none">
                        <i class="fas fa-arrow-left" title="tambah"></i>
                    </button>
                    <button type="submit" class="btn btn-success btn shadow-none"><i class="fas fa-save" title="tambah"></i></button>
                </form>
            </div>
        </div>

    </div>

    @endsection