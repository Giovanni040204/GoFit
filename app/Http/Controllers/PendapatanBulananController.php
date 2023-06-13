<?php

namespace App\Http\Controllers;

use App\Models\PendapatanBulanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendapatanBulananController extends Controller
{
    public function index(){
        $tahun = Carbon::now()->format('Y');
        $pendapatan = PendapatanBulanan::all();
        $total = 0;
        $cek = $pendapatan->count();
        for($i=0;$i<$cek;$i++){
            $total = $total + $pendapatan[$i]->total;
        }

        return view('pendapatanBulanan.index', compact('pendapatan','tahun','total'));
    }

    public function cetak(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('F');
        $tahun = Carbon::now()->format('Y');

        $date = $tanggal.' '.$bulan.' '.$tahun;

        $pendapatan = PendapatanBulanan::all();
        $total = 0;
        $cek = $pendapatan->count();
        for($i=0;$i<$cek;$i++){
            $total = $total + $pendapatan[$i]->total;
        }

        return view('pendapatanBulanan.cetak', compact('pendapatan','bulan','tahun','date','total'));
    }    
}
