@extends('dashboard/dashboardManager')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Status Jadwal Harian</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Jadwal Harian</a>
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
                            <form action="{{ url('jadwalHarian/update', $jadwalHarian->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Nama Kelas</label>
                                            <input readonly type="text" class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas" value="{{ $jadwalHarian->parentKelas->nama_kelas }}" placeholder="Masukan Nama Kelas">
                                            @error('id_kelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Nama Instruktur</label>
                                            <input readonly type="text" class="form-control @error('id_instruktur') is-invalid @enderror" name="id_instruktur" value="{{ $jadwalHarian->parentInstruktur->nama_instruktur }}" placeholder="Masukan Nama Instuktur">
                                            @error('id_instruktur')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Hari</label>
                                            <input readonly type="text" class="form-control @error('hari') is-invalid @enderror" name="hari" value="{{ $jadwalHarian->hari }}" placeholder="Masukan Hari">
                                            @error('hari')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Waktu Mulai</label>
                                        <input readonly type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" value="{{ $jadwalHarian->waktu_mulai }}" placeholder="Masukan Waktu Mulai">
                                            @error('waktu_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold">Status Kelas</label>
                                            <input type="text" class="form-control @error('status_jadwal') is-invalid @enderror" name="status_jadwal" value="{{ old('status_jadwal') }}" placeholder="Masukkan Status Kelas">
                                            @error('status_jadwal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <a href="{{ route('jadwalHarian.index') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
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