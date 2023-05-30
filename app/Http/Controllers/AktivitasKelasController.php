<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AktivitasKelasController extends Controller
{
    public function index(){
        $bulan = Carbon::now()->format('F');

        $aktivitas = DB::table('aktivitas_kelas')
                    ->join('kelas', 'kelas.id', '=', 'aktivitas_kelas.id_kelas')
                    ->join('instrukturs','instrukturs.id','=','aktivitas_kelas.id_instruktur')
                    ->orderBy('kelas.nama_kelas','asc')
                    ->get();
        
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

        return view('aktivitasKelas.index', compact('aktivitas','bulan'));
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

        $aktivitas = DB::table('aktivitas_kelas')
            ->join('kelas', 'kelas.id', '=', 'aktivitas_kelas.id_kelas')
            ->join('instrukturs','instrukturs.id','=','aktivitas_kelas.id_instruktur')
            ->orderBy('kelas.nama_kelas','asc')
            ->get();

        return view('aktivitasKelas.cetak', compact('aktivitas','bulan','tahun','date'));
    }
}
