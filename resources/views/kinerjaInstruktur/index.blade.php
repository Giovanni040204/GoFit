@extends('dashboard/dashboardManager')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$bulan}}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Kinerja Instruktur</a>
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
                                        <a href="{{ route('kinerjaInstruktur.cetak') }}" class="btn btn-sm btn-warning" target="_blank" >CETAK LAPORAN</a>
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
                                            <th class="text-center">Jumlah Hadir</th>
                                            <th class="text-center">Jumlah Libur</th>
                                            <th class="text-center">waktu Terlambat (detik)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kinerja as $item)
                                        <tr>
                                            <td class="text-center">{{$item->parentInstruktur->nama_instruktur }}</td>
                                            <td class="text-center">{{$item->jumlah_hadir}}</td>
                                            <td class="text-center">{{$item->jumlah_libur }}</td>
                                            <td class="text-center">{{$item->waktu_terlambat }}</td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Intruktur Belum Tersedia
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