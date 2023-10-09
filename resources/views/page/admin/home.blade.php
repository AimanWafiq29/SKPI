@extends('layouts.app')

@section('content')
<style>
    /* Gaya badge sukses */
    .badge-success-custom {
        background-color: #28a745;
        /* Warna latar belakang hijau */
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
    }

    /* Gaya badge gagal */
    .badge-danger-custom {
        background-color: #dc3545;
        /* Warna latar belakang merah */
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>

                        <button type="button" class="btn btn-primary btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus" title="tambah"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Status Biodata</th>
                                    <th>Status konfirmasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                @if($user->role != "admin")
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if (isset($user->biodata))
                                        {{ $user->biodata->nim }}
                                        @else
                                        -
                                        @endif
                                    </td>

                                    <td>@if (isset($user->biodata))
                                        {{ $user->biodata->nama }}
                                        @else
                                        -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($user->biodata)
                                        @if ($user->biodata->isComplete())
                                        <span class="badge badge-success-custom">Biodata sudah lengkap</span>
                                        @else
                                        <span class="badge badge-danger-custom">Biodata belum lengkap</span>
                                        @endif
                                        @else
                                        <span class="badge badge-danger-custom">Biodata belum lengkap</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($user->pesan)
                                        @if ($user->pesan->status == 'Ditolak')
                                        <span class="badge badge-danger-custom">{{ $user->pesan->status }}</span>
                                        @elseif ($user->pesan->status == 'Disetujui')
                                        <span class="badge badge-success-custom">{{ $user->pesan->status }}</span>
                                        @else
                                        <span>{{ $user->pesan->status }}</span>
                                        @endif
                                        @else
                                        <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm shadow-none">
                                                <i class="fas fa-eye" title="Detail"></i>
                                            </a>

                                            @if ($user->pesan && $user->pesan->status == "Disetujui")
                                            <a href="{{ route('admin.cetak', $user->id) }}" class="btn btn-danger btn-sm shadow-none" target="_blank">
                                                <i class="fas fa-file-pdf" title="Cetak"></i>
                                            </a>
                                            @endif

                                            <button type="button" class="btn btn-warning btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                                <i class="fas fa-edit" title="Edit"></i>
                                            </button>

                                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="createModalLabel">Ubah Mahasiswa</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <!-- Form fields go here -->
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Lengkap</label>
                                                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $user->biodata->nama }}" autofocus>
                                                                    @error('nama')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <!-- Field NIM -->
                                                                <div class="form-group">
                                                                    <label for="nim">NIM</label>
                                                                    <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ $user->biodata->nim ?? '' }}">
                                                                    @error('nim')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <!-- More form fields here -->

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @else
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create Form - Include your create form fields here -->
                <!-- Create Form - Include your create form fields here -->
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <!-- Form fields go here -->
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Field NIM -->
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim">
                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Field Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Field Konfirmasi Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
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