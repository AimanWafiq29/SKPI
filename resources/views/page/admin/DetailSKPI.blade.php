@extends('layouts.app')

@section('content')
<div class="container">



    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Tambahkan class modal-lg untuk modal yang lebih besar jika diperlukan -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($pesan)
                    <!-- Tampilkan formulir untuk mengedit pesan -->
                    <form action="{{ route('pesans.update', $pesan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-select" name="status" required>
                                <option value="Ditolak" {{ $pesan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                <option value="Disetujui" {{ $pesan->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                            </select>
                        </div>

                        <!-- Input Pesan -->
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea id="pesan" class="form-control" name="pesan" required>{{ $pesan->pesan }}</textarea>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Edit Data
                            </button>
                        </div>
                    </form>
                    @else
                    <!-- Tampilkan formulir untuk membuat pesan baru -->
                    <form action="{{ route('pesans.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <!-- Input Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-select" name="status" required>
                                <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                            </select>
                        </div>

                        <!-- Input Pesan -->
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea id="pesan" class="form-control" name="pesan" required>{{ old('pesan') }}</textarea>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="card mx-auto mb-3">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Konfirmasi Status</h6>
            </div>
        </div>
        <div class="card-body">
            @if ($user->pesan)
            @if ($user->pesan->status == "Ditolak")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Perhatian! Data Ditolak</span> {{ $user->pesan->pesan }}
                </strong>
            </div>
            @elseif ($user->pesan->status == "Disetujui")
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>
                    <i class="fas fa-check-circle"></i>
                    <span>Status Tersujui:</span> {{ $user->pesan->pesan }}
                </strong>
            </div>
            @else
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Status tidak tersedia.</span>
                </strong>
            </div>
            @endif
            @else
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Status tidak tersedia.</span>
                </strong>
            </div>
            @endif
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                Konfirmasi
            </button>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mx-auto mb-3">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Dokumen</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Nomor:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->nama}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Tanggal:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->tgl_dokumen}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mx-auto mb-3">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Nama Lengkap:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->nama}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Tempat Tanggal Lahir:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->tempat_lahir}}, {{$user->biodata->tanggal_lahir}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Nomor Induk Mahasiswa :
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->nim}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Program Studi:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->prodi}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Tahun masuk :
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->tahun_masuk}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Tahun Lulus:
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->tahun_lulus}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Gelar :
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->gelar}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Nomor Ijazah :
                                </div>
                                <div class="col-md-6">
                                    {{$user->biodata->no_ijazah}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mx-auto mb-3">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Bukti Prestasi</h6>
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
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mx-auto mb-3">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Tambahan</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Pelatihan :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->pelatihan }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Penhargaan :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->penhargaan }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Organisasi :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->organisasi }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Magang :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->magang }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Seminar :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->seminar }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Skripsi :
                                </div>
                                <div class="col-md-6">
                                    @if ($user->biodata->informasiTambahan)
                                    {{ $user->biodata->informasiTambahan->skripsi }}
                                    @else
                                    <!-- Tampilkan pesan atau tindakan yang sesuai jika objek informasiTambahan null -->
                                    tidak ada.
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mx-auto mb-3">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Action</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="btn-group" role="group">
                        <a href="{{route('admin.home')}}" class="btn btn-primary btn-shadow-none">
                            <i class="fas fa-arrow-left" title="Kembali"></i>
                        </a>
                        <a href="{{route('admin.editSKPI', $user->id)}}" class="btn btn-warning btn-shadow-none">
                            <i class="fas fa-edit" title="Edit"></i>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-shadow-none">
                                <i class="fas fa-trash" title="Hapus"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>
@endsection