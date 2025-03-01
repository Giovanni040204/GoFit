@extends('dashboard/dashboardKasir')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Member</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Member</a>
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
                                        <a href="{{ route('member.create') }}" class="btn btn-md btn-success mb-3">TAMBAH MEMBER</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <form action="{{ route('member.index') }}" class="form-inline" method="GET">
                                                <input type="search" name="search" class="form-control float-right" placeholder="Masukan Data Member">
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
                                            <th class="text-center">Nomor Member</th>
                                            <th class="text-center">Nama Member</th>
                                            <th class="text-center">Email Member</th>
                                            <th class="text-center">Telepon Member</th>
                                            <th class="text-center">Jenis Kelamin Member</th>
                                            <th class="text-center">Tanggal Lahir Member</th>
                                            <th class="text-center">Alamat Member</th>
                                            <th class="text-center">Status Member</th>
                                            <th class="text-center">Deposit Reguler</th>
                                            <th class="text-center">Deposit Kelas</th>
                                            <th class="text-center">Aksi</th>
                                            <th class="text-center">Lainnya</th>
                                            <th class="text-center">Reset Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($member as $item)
                                        <tr>
                                            <td class="text-center">{{$item->nomor_member }}</td>
                                            <td class="text-center">{{$item->nama_member }}</td>
                                            <td class="text-center">{{$item->email_member }}</td>
                                            <td class="text-center">{{$item->telepon_member }}</td>
                                            <td class="text-center">{{$item->jenis_kelamin_member }}</td>
                                            <td class="text-center">{{$item->tanggal_lahir_member }}</td>
                                            <td class="text-center">{{$item->alamat_member }}</td>
                                            <td class="text-center">{{$item->status_member}}</td>
                                            <td class="text-center">{{$item->parentDepositR->total_depositR}}</td>
                                            <td class="text-center">{{$item->parentDepositK->sisa_depositK}}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $item->id) }}" method="POST">
                                                    <a href="{{ route('member.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    <a href="{{ route('member.show', $item->id) }}" class="btn btn-sm btn-warning" target="_blank" >CETAK</a>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $item->id) }}" method="POST">
                                                    <?php
                                                        if($item->status_member == 'Non Aktif'){
                                                        ?>
                                                            <a href="{{ route('aktivasi.edit', $item->id) }}" class="btn btn-sm btn-dark" >AKTIVASI</a>
                                                        <?php
                                                        }else{
                                                            ?>
                                                            <a href="{{ route('depositReguler.edit', $item->id) }}" class="btn btn-sm btn-default" >DEPOSIT REGULER</a>
                                                            <?php
                                                                if($item->parentDepositK->sisa_depositK == 0 || $item->parentDepositK->sisa_depositK == 'Belum Melakukan Deposit'){
                                                                    ?>
                                                                        <a href="{{ route('depositKelas.edit', $item->id) }}" class="btn btn-sm btn-primary">DEPOSIT KELAS</a>
                                                                    <?php
                                                                }
                                                        }
                                                    ?>
                                                </form>
                                            </td>                                            
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.resetPassword', $item->id) }}" method="PUT">
                                                    <button type="submit" class="btn btn-sm btn-info">Reset</button>
                                                </form>
                                            </td>  
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Member Tidak Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="d-flex justify-content-center">{{$member->links()}}</div> 
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