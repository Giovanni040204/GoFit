@extends('dashboard/dashboardAdmin')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Instruktur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Instruktur</a>
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
                                        <a href="{{ route('instruktur.create') }}" class="btn btn-md btn-success mb-3">TAMBAH INSTRUKTUR</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <form action="{{ route('instruktur.index') }}" class="form-inline" method="GET">
                                                <input type="search" name="search" class="form-control float-right" placeholder="Masukan Nama Instruktur">
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
                                            <th class="text-center">Nama Instruktur</th>
                                            <th class="text-center">Email Instruktur</th>
                                            <th class="text-center">Telepon Instruktur</th>
                                            <th class="text-center">Jenis Kelamin Instruktur</th>
                                            <th class="text-center">Tanggal Lahir Instruktur</th>
                                            <th class="text-center">Alamat Instruktur</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($instruktur as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nama_instruktur }}</td>
                                            <td class="text-center">{{$item->email_instruktur }}</td>
                                            <td class="text-center">{{$item->telepon_instruktur }}</td>
                                            <td class="text-center">{{$item->jenis_kelamin_instruktur }}</td>
                                            <td class="text-center">{{$item->tanggal_lahir_instruktur }}</td>
                                            <td class="text-center">{{$item->alamat_instruktur }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('instruktur.destroy', $item->id) }}" method="POST">
                                                    <a href="{{ route('instruktur.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Instruktur Belum Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-flex justify-content-center">{{$instruktur->links()}}</div> 
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