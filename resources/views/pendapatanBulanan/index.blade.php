@extends('dashboard/dashboardManager')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$tahun}}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Pendapatan Bulanan</a>
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
                                        <a href="{{ route('pendapatanBulanan.cetak') }}" class="btn btn-sm btn-warning" target="_blank" >CETAK LAPORAN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Aktivasi</th>
                                            <th class="text-center">Deposit</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendapatan as $item)
                                        <tr>
                                            <td class="text-center">{{$item->bulan}}</td>
                                            <td class="text-center">{{$item->aktivasi }}</td>
                                            <td class="text-center">{{$item->deposit }}</td>
                                            <td class="text-center">{{$item->total }}</td>
                                        </tr>
                                            @empty
                                        <div class="alert alert-danger">
                                            Data Aktivitas Belum Tersedia
                                        </div>
                                        @endforelse
                                        <tr>
                                            <td class="text-center" colspan="3"><b>TOTAL</b></td>
                                            <td class="text-center"><b>{{$total}}</b></td>
                                        </tr>
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