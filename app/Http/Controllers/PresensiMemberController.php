<?php

namespace App\Http\Controllers;

use App\Models\JadwalHarian;
use Illuminate\Http\Request;
use App\Models\PresensiMember;
use Carbon\Carbon;

class PresensiMemberController extends Controller
{
    public function index()
    {
        $jadwalHarian = JadwalHarian::all();

        $jumlah = $jadwalHarian->count();

        $senin = 0;
        $selasa = 0;
        $rabu = 0;
        $kamis = 0;
        $jumat = 0;
        $sabtu = 0;
        $minggu = 0;

        $banyak = 0;
        $cek = 0;        

        for($i=0;$i<$jumlah;$i++){
            if($jadwalHarian[$i]->hari == 'Senin'){
                $senin++;
                if($senin > $banyak){
                    $banyak = $senin;
                }
            }else if($jadwalHarian[$i]->hari == 'Selasa'){
                $selasa++;
                if($selasa > $banyak){
                    $banyak = $selasa;
                }
            }else if($jadwalHarian[$i]->hari == 'Rabu'){
                $rabu++;
                if($rabu > $banyak){
                    $banyak = $rabu;
                }
            }else if($jadwalHarian[$i]->hari == 'Kamis'){
                $kamis++;
                if($kamis > $banyak){
                    $banyak = $kamis;
                }
            }else if($jadwalHarian[$i]->hari == 'Jumat'){
                $jumat++;
                if($jumat > $banyak){
                    $banyak = $jumat;
                }
            }else if($jadwalHarian[$i]->hari == 'Sabtu'){
                $sabtu++;
                if($sabtu > $banyak){
                    $banyak = $sabtu;
                }
            }else if($jadwalHarian[$i]->hari == 'Minggu'){
                $minggu++;
                if($minggu > $banyak){
                    $banyak = $minggu;
                }
            }
        }
        $hariIni = Carbon::now();
        $tanggal1 = date('Y-m-d', strtotime('+1 day', strtotime($hariIni)));
        $tanggal2 = date('Y-m-d', strtotime('+2 day', strtotime($hariIni))); 
        $tanggal3 = date('Y-m-d', strtotime('+3 day', strtotime($hariIni))); 
        $tanggal4 = date('Y-m-d', strtotime('+4 day', strtotime($hariIni))); 
        $tanggal5 = date('Y-m-d', strtotime('+5 day', strtotime($hariIni))); 
        $tanggal6 = date('Y-m-d', strtotime('+6 day', strtotime($hariIni))); 
        $tanggal7 = date('Y-m-d', strtotime('+7 day', strtotime($hariIni)));    

        $tanggal = [$tanggal1,$tanggal2,$tanggal3,$tanggal4,$tanggal5,$tanggal6,$tanggal7];
        $ganti=0;

        return view('presensiMember.index', compact('jadwalHarian','ganti','banyak','cek','tanggal'));        
    }

    public function indexbyid($id)
    {
        $presensi = PresensiMember::where('id_jadwalHarian','=',$id)->get();
        
        return view('presensiMember.tampil', compact('presensi'));
    }
    
    public function cetak($id){
        $presensi = PresensiMember::whereId($id)->first();
        return view('presensiMember.cetak')->with('presensi', $presensi);        
    }
}
