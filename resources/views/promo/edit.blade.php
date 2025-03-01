@extends('dashboard/dashboardAdmin')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Promo</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Promo</a>
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
                            <form action="{{ url('promo/update', $promo->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Judul Promo</label>
                                        <input type="text" class="form-control @error('judul_promo') is-invalid @enderror" name="judul_promo" value="{{ $promo->judul_promo }}" placeholder="Masukkan Judul Promo">
                                        @error('judul_promo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Jenis Promo</label>
                                        <select class="form-control  @error('jenis_promo') is-invalid @enderror" name="jenis_promo" id="jenis_promo" value="{{ $promo->jenis_promo }}">
                                            @foreach ($jenisPromo as $item)
                                            <?php
                                                if($promo->jenis_promo == $item){
                                                    ?>
                                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    <?php
                                                }
                                            ?>  
                                            @endforeach
                                        </select>
                                        @error('jenis_promo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Isi Promo</label>
                                        <input type="text" class="form-control @error('isi_promo') is-invalid @enderror" name="isi_promo" value="{{ $promo->isi_promo }}" placeholder="Masukkan Isi Promo">
                                        @error('isi_promo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <a href="{{ route('promo.index') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
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
