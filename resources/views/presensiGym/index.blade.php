@extends('dashboard/dashboardKasir')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Presensi Gym</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Presensi Gym</a>
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
                        <div class="card-body">
                            <h5>Daftar Booking Gym</h5>
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor Booking</th>
                                            <th class="text-center">Tanggal Booking</th>
                                            <th class="text-center">Nomor Member</th>
                                            <th class="text-center">Nama Member</th>
                                            <th class="text-center">Slot Waktu</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookingGym as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_bookingG }}</td>
                                            <td class="text-center">{{$item->tanggal_bookingG }}</td>
                                            <td class="text-center">{{$item->parentMember->nomor_member }}</td>
                                            <td class="text-center">{{$item->parentMember->nama_member }}</td>
                                            <td class="text-center">{{$item->waktu }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('presensiGym.store', $item->id) }}" class="btn btn-sm btn-primary">KONFIRMASI PRESENSI</a>
                                            </td>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Booking Tidak Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Daftar Presensi Booking Gym</h5>
                                <div class="table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nomor Presensi</th>
                                                <th class="text-center">Tanggal Presensi</th>
                                                <th class="text-center">Nomor Member</th>
                                                <th class="text-center">Nama Member</th>
                                                <th class="text-center">Slot Waktu</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($presensi as $item)
                                            <tr>
                                                <td class="text-center">{{$item->nomor_presensi }}</td>
                                                <td class="text-center">{{$item->tanggal_presensi }}</td>
                                                <td class="text-center">{{$item->parentMember->nomor_member}}</td>
                                                <td class="text-center">{{$item->parentMember->nama_member}}</td>
                                                <td class="text-center">{{$item->waktu }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('presensiGym.cetak', $item->id) }}" class="btn btn-sm btn-warning" target="_blank">CETAK</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Presensi Booking Gym Tidak Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>                                        
                                </div>
                                {{-- <div class="d-flex justify-content-center">{{$member->links()}}</div>  --}}
                            </div>
                        </div>                            
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