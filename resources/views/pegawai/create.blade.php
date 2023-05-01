@extends('dashboard/dashboardAdmin')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pegawai</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Pegawai</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Pegawai</label>
                                        <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Masukkan Nama Pegawai">
                                        @error('nama_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Peran Pegawai</label>
                                        <input type="text" class="form-control @error('peran_pegawai') is-invalid @enderror" name="peran_pegawai" value="{{ old('peran_pegawai') }}" placeholder="Masukkan Peran Pegawai">
                                        @error('peran_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Email Pegawai</label>
                                        <input type="text" class="form-control @error('email_pegawai') is-invalid @enderror" name="email_pegawai" value="{{ old('email_pegawai') }}" placeholder="Masukkan Email Pegawai">
                                        @error('email_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Telepon Pegawai</label>
                                        <input type="text" class="form-control @error('telepon_pegawai') is-invalid @enderror" name="telepon_pegawai" value="{{ old('telepon_pegawai') }}" placeholder="Masukkan Telepon Pegawai">
                                        @error('telepon_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Jenis Kelamin Pegawai</label>
                                        <select class="form-control  @error('jenis_kelamin_pegawai') is-invalid @enderror" name="jenis_kelamin_pegawai" id="jenis_kelamin_pegawai" value="{{ old('jenis_kelamin_pegawai') }}">
                                            <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Tanggal Lahir Pegawai</label>
                                        <input type="date" class="form-control @error('tanggal_lahir_pegawai') is-invalid @enderror" name="tanggal_lahir_pegawai" value="{{ old('tanggal_lahir_pegawai') }}" placeholder="Masukkan Tanggal Lahir Pegawai">
                                        @error('tanggal_lahir_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Alamat Pegawai</label>
                                        <input type="text" class="form-control @error('alamat_pegawai') is-invalid @enderror" name="alamat_pegawai" value="{{ old('alamat_pegawai') }}" placeholder="Masukkan Alamat Pegawai">
                                        @error('alamat_pegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
