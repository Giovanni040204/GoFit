<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initialscale=1">
        <title>GoFit | P3L_10835</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    {{-- <body onload="window.print();"> --}}
    <body>
      <div class=" min-vh-100 d-flex align-items-center justify-content-center">
          <div class="card mb-3 bgc" style="max-width: 1000px;">
            <div class="border-dark mb-3">
            <div class="row no-gutters">
                <div class="card-body">
                    <h1 class="card-title"><b>GO-FIT</b></h1>
                    <p class="card-text"><small>Jl. Centralpark No. 10 Yogyakarta</small></p>

                    <p class="card-text"><u><b>LAPORAN KINERJA INSTRUKTUR BULANAN</b></u>
                    <br><u>Bulan : {{$bulan}}  &emsp; Tahun : {{$tahun}}</u>
                    <br>Tanggal cetak : {{$date}}<br></p>

                    <table class="table table-hover text-nowrap" rules="all" border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Instruktur</th>
                                <th class="text-center">Jumlah Hadir</th>
                                <th class="text-center">Jumlah Libur</th>
                                <th class="text-center">waktu Terlambat (detik)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kinerja as $item)
                            <tr>
                                <td class="text-center">{{$item->parentInstruktur->nama_instruktur }}</td>
                                <td class="text-center">{{$item->jumlah_hadir}}</td>
                                <td class="text-center">{{$item->jumlah_libur }}</td>
                                <td class="text-center">{{$item->waktu_terlambat }}</td>
                            </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Intruktur Belum Tersedia
                                </div>
                                @endforelse
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
            </div>  
          </div>
        </div>
      </div>
    </body>
    <style>
      .bgc{
        background-color: rgb(255, 255, 255);
        border: 2px solid
      }
    </style>
</html>