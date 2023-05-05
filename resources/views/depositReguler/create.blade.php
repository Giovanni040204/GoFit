@extends('dashboard/dashboardKasir')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pembayaran Deposit Reguler</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Deposit Reguler</a>
                        </li>
                        <li class="breadcrumb-item active">Bayar</li>
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
                            <form action="{{ route('depositReguler/update', $member->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nomor Member</label>
                                        <input readonly type="text" class="form-control @error('nomor_member') is-invalid @enderror" name="nomor_member" value="{{ $member->nomor_member }}" placeholder="Masukkan nomor member">
                                        @error('nomor_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Member</label>
                                        <input readonly type="text" class="form-control @error('nama_member') is-invalid @enderror" name="nama_member" value="{{ $member->nama_member }}" placeholder="Masukkan nama member">
                                        @error('email_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Kasir Yang Bertanggung Jawab</label>
                                        <select class="form-control  @error('id_pegawai') is-invalid @enderror" name="id_pegawai" value="{{ old('id_pegawai') }}">
                                            <option value="" disabled selected hidden>Pilih Kasir</option>
                                            @foreach ($pegawai as $item)
                                                <?php
                                                    if($item->peran_pegawai == 'Kasir'){
                                                        ?>
                                                            <option value="{{ $item->id }}">{{ $item->nama_pegawai }}</option>
                                                        <?php
                                                    }
                                                ?>
                                            @endforeach
                                        </select>
                                        @error('id_pegaawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Jumlah Bayar</label>
                                        <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" placeholder="Masukkan Jumlah Bayar">
                                        @error('jumlah_bayar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Bayar</button>
                                <a href="{{ route('member.index') }}" class="btn btn-sm btn-warning" style="font-size : 18px;">CANCEL</a>
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
