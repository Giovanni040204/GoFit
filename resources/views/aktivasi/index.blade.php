@extends('dashboard/dashboardKasir')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Aktivasi</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Aktivasi</a>
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
                                            <th class="text-center">Nomor Aktivasi</th>
                                            <th class="text-center">Tanggal Aktivasi</th>
                                            <th class="text-center">Masa Berlaku</th>
                                            <th class="text-center">Nama Member</th>
                                            <th class="text-center">Kasir</th>
                                            <th class="text-center">Cetak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($aktivasi as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_aktivasi }}</td>
                                            <td class="text-center">{{$item->tanggal_aktivasi }}</td>
                                            <td class="text-center">{{$item->masa_berlaku_aktivasi }}</td>
                                            <td class="text-center">{{$item->parentMember->nama_member }}</td>
                                            <td class="text-center">{{$item->parentPegawai->nama_pegawai }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('aktivasi.show', $item->id) }}" class="btn btn-sm btn-warning" target="_blank" >CETAK</a>
                                            </td>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Aktivasi Tidak Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-flex justify-content-center">{{$aktivasi->links()}}</div> 
                                </div>
                            <!-- /.card-body -->
                            <div class="card-body">
                                <h5>Daftar Member Yang Kadaluarsa Hari Ini</h5>
                                <div class="table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nomor Member</th>
                                                <th class="text-center">Nama Member</th>
                                                <th class="text-center">Status Member</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($deaktivasi as $item)
                                            <tr>
                                                <td class="text-center">{{$item->nomor_member }}</td>
                                                <td class="text-center">{{$item->nama_member }}</td>
                                                <td class="text-center">{{$item->status_member}}</td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Tidak Ada
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>                                        
                                </div>
                                <?php
                                if($b != 0){
                                    ?>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('aktivasi.deaktivasi') }}" method="PUT">
                                            <button type="submit" class="btn btn-sm btn-info">DEAKTIVASI MEMBER</button>
                                        </form>
                                    </td>  
                                    <?php
                                }
                                ?>
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