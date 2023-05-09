@extends('dashboard/dashboardKasir')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Deposit Kelas</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Deposit Kelas</a>
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
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor Deposit</th>
                                            <th class="text-center">Tanggal Deposit</th>
                                            <th class="text-center">Masa Berlaku</th>
                                            <th class="text-center">Jenis Kelas</th>
                                            <th class="text-center">Jenis Deposit</th>
                                            <th class="text-center">Jumlah Deposit</th>
                                            <th class="text-center">Jumlah Harga</th>
                                            <th class="text-center">Bonus Deposit</th>
                                            <th class="text-center">Sisa Deposit</th>
                                            <th class="text-center">Nama Member</th>
                                            <th class="text-center">Kasir</th>
                                            <th class="text-center">Cetak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($depositK as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_depositK }}</td>
                                            <td class="text-center">{{$item->tanggal_depositK }}</td>
                                            <td class="text-center">{{$item->masa_berlaku_depositK }}</td>
                                            <td class="text-center">{{$item->parentKelas->nama_kelas }}</td>
                                            <td class="text-center">{{$item->jenis_depositK }}</td>
                                            <td class="text-center">{{$item->jumlah_depositK }}</td>
                                            <td class="text-center">{{$item->bayar_depositK }}</td>
                                            <td class="text-center">{{$item->bonus_depositK }}</td>
                                            <td class="text-center">{{$item->sisa_depositK }}</td>
                                            <td class="text-center">{{$item->parentMember->nama_member }}</td>
                                            <td class="text-center">{{$item->parentPegawai->nama_pegawai }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('depositKelas.show', $item->id) }}" class="btn btn-sm btn-warning" target="_blank" >CETAK</a>
                                            </td>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Deposit Kelas Tidak Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-flex justify-content-center">{{$depositK->links()}}</div> 
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