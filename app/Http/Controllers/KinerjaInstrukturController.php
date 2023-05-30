<?php

namespace App\Http\Controllers;

use App\Models\KinerjaInstruktur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KinerjaInstrukturController extends Controller
{
    public function index(){
        $bulan = Carbon::now()->format('F');
        $kinerja = KinerjaInstruktur::all();
        
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

        return view('kinerjaInstruktur.index', compact('kinerja','bulan'));
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

        $kinerja = KinerjaInstruktur::all();

        return view('kinerjaInstruktur.cetak', compact('kinerja','bulan','tahun','date'));
    }    
}
