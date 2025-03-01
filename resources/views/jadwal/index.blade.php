@extends('dashboard/dashboardManager')

@section('content')
@include('sweetalert::alert')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('jadwal')}}">Jadwal</a>
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
                        <a href="{{ route('jadwal.create') }}" class="btn btn-md btn-success mb-3">TAMBAH JADWAL</a>
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Hari</th>
                                            <th class="text-center">Waktu Mulai</th>
                                            <th class="text-center">Waktu Selesai</th>
                                            <th class="text-center">Nama Kelas</th>
                                            <th class="text-center">Nama Instruktur</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jadwal as $item)
                                        <tr>
                                            <td class="text-center">{{$item->hari }}</td>
                                            <td class="text-center">{{$item->waktu_mulai }}</td> 
                                            <td class="text-center">{{$item->waktu_selesai }}</td>                                           
                                            <td class="text-center">{{$item->parentKelas->nama_kelas}}</td>
                                            <td class="text-center">{{$item->parentInstruktur->nama_instruktur}}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                                    <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Jadwal belum tersedia
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="display:flex; justify-content:center;">
                                    {{  $jadwal->links() }}
                                </div>
                                
                            </div>
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