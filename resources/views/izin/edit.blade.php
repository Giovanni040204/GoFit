@extends('dashboard/dashboardKasir')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Izin Instruktur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Izin</a>
                        </li>
                        <li class="breadcrumb-item active">Konfirmasi</li>
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
                            <form action="{{ route('izin/updateWeb', $izin->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Instruktur</label>
                                        <input readonly type="text" class="form-control @error('id_instruktur') is-invalid @enderror" name="id_instruktur" value="{{ $izin->parentInstruktur->nama_instruktur }}" placeholder="Masukkan nama instruktur">
                                        @error('id_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Kelas Yang Izin</label>
                                        <input readonly type="text" class="form-control @error('id_jadwalHarian') is-invalid @enderror" name="id_jadwalHarian" value="{{ $izin->parentJadwalHarian->parentKelas->nama_kelas }} - {{$izin->parentJadwalHarian->hari}}, {{$izin->parentJadwalHarian->tanggal}}" placeholder="Masukkan nama kelas">
                                        @error('id_jadwalHarian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Keterangan Izin</label>
                                        <input readonly type="text" class="form-control @error('keterangan_izin') is-invalid @enderror" name="keterangan_izin" value="{{ $izin->keterangan_izin }}" placeholder="Masukkan keterangan izin">
                                        @error('keterangan_izin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Konfrimasi Izin</label>
                                        <select class="form-control  @error('konfirmasi_izin') is-invalid @enderror" name="konfirmasi_izin" value="{{ old('konfirmasi_izin') }}">
                                            <option value="" disabled selected hidden>Pilih Konfirmasi</option>
                                            <option value="Diizinkan">Diizinkan</option>
                                            <option value="Tidak Diizinkan">Tidak Diizinkan</option>
                                        </select>
                                        @error('konfirmasi_izin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Konfirmasi</button>
                                <a href="{{ route('izin.indexWeb') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
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
