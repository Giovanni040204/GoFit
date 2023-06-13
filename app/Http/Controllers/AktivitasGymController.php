<?php

namespace App\Http\Controllers;

use App\Models\AktivitasGym;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AktivitasGymController extends Controller
{
    public function index(){
        $bulan = Carbon::now()->format('F');
        
        if($bulan == "January"){
            $bulan = "Januari";
        }else if($bulan == "February"){
            $bulan = "Februari";
        }else if($bulan == "March"){
            $bulan = "Maret";
        }else if($bulan == "April"){
            $bulan = "April";
        }else if($bulan == "May"){
            $bulan = "Mei";
        }else if($bulan == "June"){
            $bulan = "Juni";
        }else if($bulan == "July"){
            $bulan = "Juli";
        }else if($bulan == "August"){
            $bulan = "Agustus";
        }else if($bulan == "September"){
            $bulan = "September";
        }else if($bulan == "October"){
            $bulan = "Oktober";
        }else if($bulan == "November"){
            $bulan = "November";
        }else if($bulan == "December"){
            $bulan = "Desember";
        }

        $total = 0;
        $aktivitas = AktivitasGym::where('bulan','=',$bulan)->get();
        $cek = $aktivitas->count();
        for($i=0;$i<$cek;$i++){
            $total = $total + $aktivitas[$i]->jumlah_member;
        }

        return view('aktivitasGym.index', compact('aktivitas','bulan','total'));
    }

    public function cetak(){
        $tanggal = Carbon::now()->format('d');
        $bulan = Carbon::now()->format('F');
        $tahun = Carbon::now()->format('Y');
        
        if($bulan == "January"){
            $bulan = "Januari";
        }else if($bulan == "February"){
            $bulan = "Februari";
        }else if($bulan == "March"){
            $bulan = "Maret";
        }else if($bulan == "April"){
            $bulan = "April";
        }else if($bulan == "May"){
            $bulan = "Mei";
        }else if($bulan == "June"){
            $bulan = "Juni";
        }else if($bulan == "July"){
            $bulan = "Juli";
        }else if($bulan == "August"){
            $bulan = "Agustus";
        }else if($bulan == "September"){
            $bulan = "September";
        }else if($bulan == "October"){
            $bulan = "Oktober";
        }else if($bulan == "November"){
            $bulan = "November";
        }else if($bulan == "December"){
            $bulan = "Desember";
        }

        $date = $tanggal.' '.$bulan.' '.$tahun;

        $total = 0;
        $aktivitas = AktivitasGym::where('bulan','=',$bulan)->get();
        $cek = $aktivitas->count();
        for($i=0;$i<$cek;$i++){
            $total = $total + $aktivitas[$i]->jumlah_member;
        }

        return view('aktivitasGym.cetak', compact('aktivitas','bulan','tahun','date','total'));
    }
}
