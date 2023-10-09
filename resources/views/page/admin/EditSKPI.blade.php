@extends('layouts.app')




@section('content')

<div class="container">
    <form action="{{ route('admin.updateSKPI', $user->id) }}" method="POST">
        @csrf

        @method('PUT')

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1></h1>
            <div class="text-right mb-3">
                <button onclick="window.history.back()" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white">
                        <i class="fas fa-arrow-left text-white"></i> <!-- Icon for Back, warna putih -->
                    </span>
                    <span class="text">Kembali</span>
                </button>

                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white">
                        <i class="fas fa-paper-plane text-white"></i> <!-- Icon for Kirim, warna putih -->
                    </span>
                    <span class="text">Kirim</span>
                </button>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6">
                <!-- Card Biodata -->
                <div class="card mx-auto mb-3">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Input Nama Lengkap -->
                        <div class="form-group row mb-3">
                            <div class="col-md-4">
                                <label for="nama" class="col-form-label">Nama Lengkap</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $user->biodata->nama }}" autofocus>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Input Tempat Lahir -->
                            <div class="col-md-4">
                                <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ $user->biodata->tempat_lahir }}" autofocus>
                                @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Input Tanggal Lahir -->
                            <div class="col-md-4">
                                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $user->biodata->tanggal_lahir }}" autofocus>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input Nomor Induk Mahasiswa (NIM) -->
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label for="nim" class="col-form-label">Nomor Induk Mahasiswa (NIM)</label>
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ $user->biodata->nim }}" autofocus>
                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Input Program Studi -->
                            <div class="col-md-6">
                                <label for="prodi" class="col-form-label">Program Studi</label>
                                <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ $user->biodata->prodi }}" autofocus>
                                @error('prodi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <!-- Input Tahun Masuk -->
                            <div class="col-md-4">
                                <label for="tahun_masuk" class="col-form-label">Tahun Masuk</label>
                                <input id="tahun_masuk" type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" name="tahun_masuk" value="{{ $user->biodata->tahun_masuk }}" autofocus>
                                @error('tahun_masuk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Input Tahun Lulus -->
                            <div class="col-md-4">
                                <label for="tahun_lulus" class="col-form-label">Tahun Lulus</label>
                                <input id="tahun_lulus" type="text" class="form-control @error('tahun_lulus') is-invalid @enderror" name="tahun_lulus" value="{{ $user->biodata->tahun_lulus }}" autofocus>
                                @error('tahun_lulus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Input Gelar -->
                            <div class="col-md-4">
                                <label for="gelar" class="col-form-label">Gelar</label>
                                <input id="gelar" type="text" class="form-control @error('gelar') is-invalid @enderror" name="gelar" value="{{ $user->biodata->gelar }}" autofocus>
                                @error('gelar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <!-- Input Nomor Ijazah -->
                            <div class="col-md-12">
                                <label for="no_ijazah" class="col-form-label">Nomor Ijazah</label>
                                <input id="no_ijazah" type="text" class="form-control @error('no_ijazah') is-invalid @enderror" name="no_ijazah" value="{{ $user->biodata->no_ijazah }}" autofocus>
                                @error('no_ijazah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Card Biodata -->

                <!-- Card Informasi Tambahan -->
                <div class="card mx-auto mb-3">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Tambahan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Input Pelatihan -->
                        <div class="row">
                            <div class="col-md-6">
                                Pelatihan :
                            </div>
                            <div class="col-md-6">
                                <select name="pelatihan" class="form-control">
                                    <option value="ada" @if($user->pelatihan == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->pelatihan == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Input Penhargaan -->
                        <div class="row">
                            <div class="col-md-6">
                                Penhargaan :
                            </div>
                            <div class="col-md-6">
                                <select name="penhargaan" class="form-control">
                                    <option value="ada" @if($user->penhargaan == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->penhargaan == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Input Organisasi -->
                        <div class="row">
                            <div class="col-md-6">
                                Organisasi :
                            </div>
                            <div class="col-md-6">
                                <select name="organisasi" class="form-control">
                                    <option value="ada" @if($user->organisasi == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->organisasi == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Input Magang -->
                        <div class="row">
                            <div class="col-md-6">
                                Magang :
                            </div>
                            <div class="col-md-6">
                                <select name="magang" class="form-control">
                                    <option value="ada" @if($user->magang == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->magang == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Input Seminar -->
                        <div class="row">
                            <div class="col-md-6">
                                Seminar :
                            </div>
                            <div class="col-md-6">
                                <select name="seminar" class="form-control">
                                    <option value="ada" @if($user->seminar == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->seminar == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- Input Skripsi -->
                        <div class="row">
                            <div class="col-md-6">
                                Skripsi :
                            </div>
                            <div class="col-md-6">
                                <select name="skripsi" class="form-control">
                                    <option value="ada" @if($user->skripsi == 'ada') selected @endif>Ada</option>
                                    <option value="tidak ada" @if($user->skripsi == 'tidak ada') selected @endif>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Card Informasi Tambahan -->
            </div>
            <div class="col-md-6">
                <!-- Card Informasi Dokumen -->
                <div class="card mx-auto mb-3">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Dokumen</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Input Nomor Dokumen -->
                        <div class="form-group row mb-3">
                            <label for="no_dokumen" class="col-md-4 col-form-label text-md-center">No Dokumen</label>
                            <div class="col-md-6">
                                <input id="no_dokumen" type="text" class="form-control @error('no_dokumen') is-invalid @enderror" name="no_dokumen" value="{{ $user->biodata->no_dokumen }}" autofocus>
                                @error('no_dokumen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <!-- Input Tanggal Dokumen -->
                        <div class="form-group row mb-3">
                            <label for="tgl_dokumen" class="col-md-4 col-form-label text-md-center">Tanggal Dokumen</label>
                            <div class="col-md-6">
                                <input id="tgl_dokumen" type="date" class="form-control @error('tgl_dokumen') is-invalid @enderror" name="tgl_dokumen" value="{{ $user->biodata->tgl_dokumen }}" autofocus>
                                @error('tgl_dokumen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Card Informasi Dokumen -->

                <!-- Card Bukti Prestasi -->
                <div class="card mx-auto mb-3">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bukti Prestasi</h6>

                            <!-- Tombol untuk membuka modal -->
                            <button type="button" class="btn btn-primary btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus" title="tambah"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Prestasi</th>
                                        <th>Kategori</th>
                                        <th>Lihat Bukti</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($buktis) > 0)
                                    <!-- Display data from $buktis -->
                                    @foreach($buktis as $index => $bukti)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $bukti->nama_prestasi }}</td>
                                        <td>{{ $bukti->kategori }}</td>
                                        <td>
                                            <!-- Add a link to view the file if applicable -->
                                            @if($bukti->file)
                                            <a href="{{ asset('uploads/' . $bukti->file) }}" target="_blank">View</a>
                                            @else
                                            No File
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{route('buktiPrestasis.destroy',$bukti->id)}}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm shadow-none btn-hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">No data available for this user.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End of Card Bukti Prestasi -->
            </div>
        </div>
    </form>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bukti Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir Anda dimasukkan ke dalam modal di sini -->
                <form method="POST" action="{{ route('buktiPrestasis.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="form-group">
                        <label for="namaPrestasi">Nama Prestasi</label>
                        <input id="namaPrestasi" type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" name="nama_prestasi" value="{{ old('nama_prestasi') }}" required autofocus>
                        @error('nama_prestasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategoriPrestasi">Kategori</label>
                        <select id="kategoriPrestasi" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required>
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
                    <div class="form-group">
                        <label for="filePrestasi">File Bukti</label>
                        <input id="filePrestasi" type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" required>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- More form fields here -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection