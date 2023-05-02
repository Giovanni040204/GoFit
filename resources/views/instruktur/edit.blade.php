@extends('dashboard/dashboardAdmin')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Instruktur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Instruktur</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <form action="{{ url('instruktur/update', $instruktur->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Instruktur</label>
                                        <input type="text" class="form-control @error('nama_instruktur') is-invalid @enderror" name="nama_instruktur" value="{{ $instruktur->nama_instruktur }}" placeholder="Masukkan Nama instruktur">
                                        @error('nama_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Email Instruktur</label>
                                        <input type="email" class="form-control @error('email_instruktur') is-invalid @enderror" name="email_instruktur" value="{{ $instruktur->email_instruktur }}" placeholder="Masukkan Email instruktur">
                                        @error('email_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Telepon Instruktur</label>
                                        <input type="number" class="form-control @error('telepon_instruktur') is-invalid @enderror" name="telepon_instruktur" value="{{ $instruktur->telepon_instruktur }}" placeholder="Masukkan Telepon instruktur">
                                        @error('telepon_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Jenis Kelamin Instruktur</label>
                                        <select class="form-control  @error('jenis_kelamin_instruktur') is-invalid @enderror" name="jenis_kelamin_instruktur" id="jenis_kelamin_instruktur" value="{{ $instruktur->jenis_kelamin_instruktur }}">
                                            <option value="" disabled selected hidden>{{ $instruktur->jenis_kelamin_instruktur }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Tanggal Lahir Instruktur</label>
                                        <input type="date" class="form-control @error('tanggal_lahir_instruktur') is-invalid @enderror" name="tanggal_lahir_instruktur" value="{{ $instruktur->tanggal_lahir_instruktur}}" placeholder="Masukkan Tanggal Lahir instruktur">
                                        @error('tanggal_lahir_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Alamat Instruktur</label>
                                        <input type="text" class="form-control @error('alamat_instruktur') is-invalid @enderror" name="alamat_instruktur" value="{{ $instruktur->alamat_instruktur }}" placeholder="Masukkan Alamat instruktur">
                                        @error('alamat_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <a href="{{ route('instruktur.index') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
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
