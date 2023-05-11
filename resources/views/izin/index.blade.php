@extends('dashboard/dashboardManager')

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
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <b>BELUM DIKONFIRMASI</b>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Instruktur</th>
                                            <th class="text-center">Kelas Yang Izin</th>
                                            <th class="text-center">Keterangan Izin</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($izinBelum as $item)
                                        <tr>
                                            <td class="text-center">{{$item->parentInstruktur->nama_instruktur }}</td>
                                            <td class="text-center">{{$item->parentJadwalHarian->parentkelas->nama_kelas }}</td>
                                            <td class="text-center">{{$item->keterangan_izin }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('izin.edit', $item->id) }}" class="btn btn-sm btn-primary">KONFIRMASI</a>
                                            </td>
                                        </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data Izin Yang Belum Dikonfirmasi Belum Tersedia
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                    {{-- <div class="d-flex justify-content-center">{{$instruktur->links()}}</div>  --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <b>SUDAH DIKONFIRMASI</b>
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Instruktur</th>
                                                <th class="text-center">Kelas Yang Izin</th>
                                                <th class="text-center">Keterangan Izin</th>
                                                <th class="text-center">Konfirmasi Izin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($izinSudah as $item)
                                            <tr>
                                                <td class="text-center">{{$item->parentInstruktur->nama_instruktur }}</td>
                                                <td class="text-center">{{$item->parentJadwalHarian->parentkelas->nama_kelas }}</td>
                                                <td class="text-center">{{$item->keterangan_izin }}</td>
                                                <td class="text-center">{{$item->konfirmasi_izin }}</td>
                                            </tr>
                                                @empty
                                                <div class="alert alert-danger">
                                                    Data Izin Belum Tersedia
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