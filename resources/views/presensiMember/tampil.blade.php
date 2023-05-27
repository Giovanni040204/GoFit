@extends('dashboard/dashboardKasir')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Presensi Member</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Presensi Member</a>
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
                                        <a href="{{ url('presensiMember') }}" class="btn btn-md btn-success mb-3">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor Presensi</th>
                                            <th class="text-center">Tanggal Presensi</th>
                                            <th class="text-center">Nomor Member</th>
                                            <th class="text-center">Nama Member</th>
                                            <th class="text-center">Nama Kelas</th>
                                            <th class="text-center">Jam Mulai Kelas</th>
                                            <th class="text-center">Nama Instruktur</th>
                                            <th class="text-center">Deposit Yang Dipotong</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($presensi as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_presensi }}</td>
                                            <td class="text-center">{{$item->tanggal_presensi }}</td>
                                            <td class="text-center">{{$item->parentMember->nomor_member }}</td>
                                            <td class="text-center">{{$item->parentMember->nama_member }}</td>
                                            <td class="text-center">{{$item->parentJadwalHarian->parentKelas->nama_kelas }}</td>
                                            <td class="text-center">{{$item->parentJadwalHarian->waktu_mulai }}</td>
                                            <td class="text-center">{{$item->parentJadwalHarian->parentInstruktur->nama_instruktur }}</td>
                                            <td class="text-center">
                                                <?php
                                                    if($item->id_depositReguler == 0){
                                                    ?>
                                                        Deposit Kelas
                                                    <?php
                                                    }else{
                                                    ?>
                                                        Deposit Reguler
                                                    <?php
                                                    }    
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('presensiMember.cetak', $item->id) }}" class="btn btn-sm btn-warning" target="_blank" >CETAK</a>
                                            </td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Presensi Belum Tersedia
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