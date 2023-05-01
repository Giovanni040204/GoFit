@extends('dashboard/dashboardAdmin')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pegawai</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Pegawai</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
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
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <a href="{{ route('pegawai.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PEGAWAI</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <form action="{{ route('pegawai.index') }}" class="form-inline" method="GET">
                                                <input type="search" name="search" class="form-control float-right" placeholder="Masukan Nama Pegawai">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                            </form>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Pegawai</th>
                                            <th class="text-center">Peran Pegawai</th>
                                            <th class="text-center">Email Pegawai</th>
                                            <th class="text-center">Telepon Pegawai</th>
                                            <th class="text-center">Jenis Kelamin Pegawai</th>
                                            <th class="text-center">Tanggal Lahir Pegawai</th>
                                            <th class="text-center">Alamat Pegawai</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pegawai as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nama_pegawai }}</td>
                                            <td class="text-center">{{$item->peran_pegawai }}</td>
                                            <td class="text-center">{{$item->email_pegawai }}</td>
                                            <td class="text-center">{{$item->telepon_pegawai }}</td>
                                            <td class="text-center">{{$item->jenis_kelamin_pegawai }}</td>
                                            <td class="text-center">{{$item->tanggal_lahir_pegawai }}</td>
                                            <td class="text-center">{{$item->alamat_pegawai }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $item->id) }}" method="POST">
                                                    <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Pegawai Belum Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-flex justify-content-center">{{$pegawai->links()}}</div> 
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