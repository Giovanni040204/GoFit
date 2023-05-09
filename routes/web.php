<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
});

Route::get('/home',function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', function () {
        return view('dashboard/dashboardAdmin');
    })->middleware('userAkses:admin');
    Route::get('/manager', function () {
        return view('dashboard/dashboardManager');
    })->middleware('userAkses:manager');;
    Route::get('/kasir', function () {
        return view('dashboard/dashboardKasir');
    })->middleware('userAkses:kasir');;
    Route::get('/logout',[SesiController::class,'logout']);
});



//Route Resource
Route::resource('/pegawai',\App\Http\Controllers\PegawaiController::class);
Route::get('pegawai/edit/{id}', '\App\Http\Controllers\PegawaiController@edit');
Route::post('pegawai/update/{id}', '\App\Http\Controllers\PegawaiController@update');

Route::resource('/instruktur',\App\Http\Controllers\InstrukturController::class);
Route::get('instruktur/edit/{id}', '\App\Http\Controllers\InstrukturController@edit');
Route::post('instruktur/update/{id}', '\App\Http\Controllers\InstrukturController@update');

Route::resource('/kelas',\App\Http\Controllers\KelasController::class);
Route::get('kelas/edit/{id}', '\App\Http\Controllers\KelasController@edit');
Route::post('kelas/update/{id}', '\App\Http\Controllers\KelasController@update');

Route::resource('/jadwal',\App\Http\Controllers\JadwalController::class);
Route::get('jadwal/edit/{id}', '\App\Http\Controllers\JadwalController@edit');
Route::post('jadwal/update/{id}', '\App\Http\Controllers\JadwalController@update');

Route::resource('/promo',\App\Http\Controllers\PromoController::class);
Route::get('promo/edit/{id}', '\App\Http\Controllers\PromoController@edit');
Route::post('promo/update/{id}', '\App\Http\Controllers\PromoController@update');

Route::resource('/member',\App\Http\Controllers\MemberController::class);
Route::get('member/edit/{id}', '\App\Http\Controllers\MemberController@edit');
Route::post('member/update/{id}', '\App\Http\Controllers\MemberController@update');
Route::get('member/resetPassword/{id}', '\App\Http\Controllers\MemberController@resetPassword')->name('member.resetPassword');

Route::resource('/aktivasi',\App\Http\Controllers\AktivasiController::class);
Route::get('aktivasi/edit/{id}', '\App\Http\Controllers\AktivasiController@edit');
Route::post('aktivasi/update/{id}', '\App\Http\Controllers\AktivasiController@update')->name('aktivasi/update');
Route::get('aktivasi/cetak/{id}', '\App\Http\Controllers\AktivasiController@cetak')->name('aktivasi.cetak');

Route::resource('/depositReguler',\App\Http\Controllers\DepositRegulerController::class);
Route::get('depositReguler/edit/{id}', '\App\Http\Controllers\DepositRegulerController@edit');
Route::post('depositReguler/update/{id}', '\App\Http\Controllers\DepositRegulerController@update')->name('depositReguler/update');

Route::resource('/depositKelas',\App\Http\Controllers\DepositKelasController::class);
Route::get('depositKelas/kelas/{id}', '\App\Http\Controllers\DepositKelasController@edit');
Route::post('depositKelas/kelas/{id}', '\App\Http\Controllers\DepositKelasController@update')->name('depositKelas/update');

Route::resource('/jadwalHarian',\App\Http\Controllers\JadwalHarianController::class);
Route::get('jadwalHarian/edit/{id}', '\App\Http\Controllers\JadwalHarianController@edit');
Route::post('jadwalHarian/update/{id}', '\App\Http\Controllers\JadwalHarianController@update');