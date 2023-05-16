@extends('dashboard/dashboardKasir')

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
                        <li class="breadcrumb-item active">Terlambat</li>
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
                                        <a href="{{ route('instruktur.resetTerlambat') }}" class="btn btn-md btn-success mb-3">RESET TERLAMBAT INSTRUKTUR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor Instruktur</th>
                                            <th class="text-center">Nama Instruktur</th>
                                            <th class="text-center">Jumlah Terlambat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($instruktur as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_instruktur }}</td>
                                            <td class="text-center">{{$item->nama_instruktur }}</td>
                                            <td class="text-center">{{$item->jumlah_terlambat }}</td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Instruktur Belum Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    {{-- <div class="d-flex justify-content-center">{{$instruktur->links()}}</div>  --}}
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