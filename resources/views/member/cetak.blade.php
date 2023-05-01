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
    <body onload="window.print();">
      <div class=" min-vh-100 d-flex align-items-center justify-content-center">
          <div class="card mb-3 bgc" style="max-width: 540px;">
            <div class="border-dark mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://i.pinimg.com/originals/dc/0e/36/dc0e36c68fe8c0ab31bc8241f081c6b6.jpg" class="card-img" alt="...">
              </div class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp');">
              <div class="col-md-8">
                <div class="card-body">
                  <h1 class="card-title"><b>GO-FIT</b></h1>
                  <p class="card-text"><small>Jl. Centralpark No. 10 Yogyakarta</small></p>
                  <h1 class="card-title"><b>MEMBERCARD</b></h1>
                  <p class="card-text">Nomor Member : {{  $member->nomor_member }}
                    <br>Member ID : {{  $member->nama_member }}
                    <br>Alamat : {{  $member->alamat_member }}
                    <br>Telepon : {{  $member->telepon_member }}</p>
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
        background-color: crimson;
        border: 10px solid
      }
    </style>
</html>