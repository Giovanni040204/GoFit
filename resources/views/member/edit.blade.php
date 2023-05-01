@extends('dashboard/dashboardKasir')

@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Member</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Member</a>
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
                            <form action="{{ url('member/update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Nama Member</label>
                                        <input type="text" class="form-control @error('nama_member') is-invalid @enderror" name="nama_member" value="{{ $member->nama_member }}" placeholder="Masukkan Nama member">
                                        @error('nama_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Email Member</label>
                                        <input type="text" class="form-control @error('email_member') is-invalid @enderror" name="email_member" value="{{ $member->email_member }}" placeholder="Masukkan Email member">
                                        @error('email_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Telepon Member</label>
                                        <input type="text" class="form-control @error('telepon_member') is-invalid @enderror" name="telepon_member" value="{{ $member->telepon_member }}" placeholder="Masukkan Telepon member">
                                        @error('telepon_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Jenis Kelamin Member</label>
                                        <select class="form-control  @error('jenis_kelamin_member') is-invalid @enderror" name="jenis_kelamin_member" id="jenis_kelamin_member" value="{{ $member->jenis_kelamin_member }}">
                                            <option value="" disabled selected hidden>{{ $member->jenis_kelamin_member }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Tanggal Lahir Member</label>
                                        <input type="date" class="form-control @error('tanggal_lahir_member') is-invalid @enderror" name="tanggal_lahir_member" value="{{ $member->tanggal_lahir_member}}" placeholder="Masukkan Tanggal Lahir member">
                                        @error('tanggal_lahir_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-bold">Alamat Member</label>
                                        <input type="text" class="form-control @error('alamat_member') is-invalid @enderror" name="alamat_member" value="{{ $member->alamat_member }}" placeholder="Masukkan Alamat member">
                                        @error('alamat_member')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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
