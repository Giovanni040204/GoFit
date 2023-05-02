@extends('dashboard/dashboardManager')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Jadwal</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Jadwal</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <form action="{{ url('jadwal/update', $jadwal->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Kelas</label>
                                        <select class="form-control  @error('id_kelas') is-invalid @enderror" name="id_kelas" value="{{ $jadwal->id_kelas }}">
                                            @foreach ($kelas as $item)
                                            <?php
                                                if($jadwal->id_kelas == $item->id){
                                                    ?>
                                                        <option value="{{ $item->id }}" selected>{{ $item->nama_kelas}}</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="{{ $item->id }}">{{ $item->nama_kelas}}</option>
                                                    <?php
                                                }
                                            ?>  
                                            @endforeach
                                        </select>
                                        @error('id_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Instruktur</label>
                                        <select class="form-control  @error('id_instruktur') is-invalid @enderror" name="id_instruktur" value="{{ $jadwal->id_instruktur }}">
                                            @foreach ($instruktur as $item)
                                            <?php
                                                if($jadwal->id_instruktur == $item->id){
                                                    ?>
                                                        <option value="{{ $item->id }}" selected>{{ $item->nama_instruktur }}</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="{{ $item->id }}">{{ $item->nama_instruktur }}</option>
                                                    <?php
                                                }
                                            ?>
                                            @endforeach
                                        </select>
                                        @error('id_instruktur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Hari</label>
                                        <select class="form-control  @error('hari') is-invalid @enderror" name="hari" id="hari" value="{{ $jadwal->hari }}">
                                            @foreach ($hari as $item)
                                            <?php
                                                if($jadwal->hari == $item){
                                                    ?>
                                                        <option value="{{ $item }}" selected>{{ $item}}</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    <?php
                                                }
                                            ?>
                                            @endforeach
                                        </select>
                                        @error('hari')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Waktu Mulai</label>
                                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" value="{{ $jadwal->waktu_mulai }}" placeholder="Masukan Waktu Mulai">
                                            @error('waktu_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Waktu Selesai</label>
                                        <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" value="{{ $jadwal->waktu_selesai }}" placeholder="Masukan Waktu Selesai">
                                            @error('waktu_selesai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <a href="{{ route('jadwal.index') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
                            </form>
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