<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Jadwal;
use App\Models\JadwalHarian;
use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalHarianController extends Controller
{
        /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $jadwalHarian = JadwalHarian::
                            join('kelas','jadwal_harians.id_kelas','=','kelas.id')
                            ->join('instrukturs','jadwal_harians.id_instruktur','=','instrukturs.id')
                            ->where('kelas.nama_kelas','LIKE','%'.$request->search.'%')
                            ->orWhere('instrukturs.nama_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('jadwal_harians.hari','LIKE','%'.$request->search.'%')
                            ->orWhere('jadwal_harians.tanggal','LIKE','%'.$request->search.'%')
                            ->orWhere('jadwal_harians.waktu_mulai','LIKE','%'.$request->search.'%')
                            ->orWhere('jadwal_harians.status_jadwal','LIKE','%'.$request->search.'%')
                            ->get();
        }else{
            $jadwalHarian = JadwalHarian::all();
        }

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

        return view('jadwalHarian.index', compact('jadwalHarian','ganti','banyak','cek','tanggal'));
    }

    public function create()
    {
        $jadwalHarian = JadwalHarian::all();

        $cekIsi = $jadwalHarian->count();      

        if($cekIsi == 0){
            $jadwal = Jadwal::orderBy('hari','ASC')->orderBy('waktu_mulai','ASC')->get();
        
            $cek = $jadwal->count();

            $hariIni = Carbon::now();
            $tanggal1 = date('Y-m-d', strtotime('+1 day', strtotime($hariIni)));              
    
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Senin'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal1,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal2 = date('Y-m-d', strtotime('+2 day', strtotime($hariIni)));    
    
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Selasa'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal2,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal3 = date('Y-m-d', strtotime('+3 day', strtotime($hariIni)));    
            
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Rabu'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal3,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal4 = date('Y-m-d', strtotime('+4 day', strtotime($hariIni)));    
            
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Kamis'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal4,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal5 = date('Y-m-d', strtotime('+5 day', strtotime($hariIni)));    
            
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Jumat'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal5,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal6 = date('Y-m-d', strtotime('+6 day', strtotime($hariIni)));    
            
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Sabtu'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal6,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }

            $tanggal7 = date('Y-m-d', strtotime('+7 day', strtotime($hariIni)));    
            
            for($i=0;$i<$cek;$i++){
                if($jadwal[$i]->hari == 'Minggu'){
                    JadwalHarian::create([
                        'id_kelas' => $jadwal[$i]->id_kelas,
                        'id_instruktur' => $jadwal[$i]->id_instruktur,
                        'tanggal' => $tanggal7,
                        'hari' => $jadwal[$i]->hari,
                        'waktu_mulai' => $jadwal[$i]->waktu_mulai,
                        'waktu_selesai' => $jadwal[$i]->waktu_selesai,
                        'status_jadwal' => '-'
                    ]);
                }
            }


            
            return redirect()->route('jadwalHarian.index')->with(['success' => 'Jadwal Berhasil Digenerate 1 Minggu Kedepan']);
        }else{
            return redirect()->route('jadwalHarian.index')->with(['error' => 'Jadwal Sudah Digenerate 1 Minggu Kedepan']);
        }

    }

    public function edit($id){
        $kelas = Kelas::all();
        $instruktur = Instruktur::all();
        $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        $jadwalHarian = JadwalHarian::whereId($id)->first();
        return view('jadwalHarian.edit', compact('kelas','instruktur','hari'))->with('jadwalHarian', $jadwalHarian);
    }
    
    public function update(Request $request, $id){
        $this->validate($request, [
            'status_jadwal' => 'required'
        ]);

        if($request->status_jadwal == '-'){
            return redirect()->route('jadwalHarian.index')->with(['error' => 'Inputan Status Jadwal Tidak Valid']);
        }

        $jadwalHarian = JadwalHarian::whereId($id)->first();
        $jadwalHarian->update([
            'id_instruktur' => $request->id_instruktur,
            'status_jadwal' => $request->status_jadwal
        ]);

        return redirect()->route('jadwalHarian.index')->with(['success' => 'Status Jadwal Harian Berhasil Diedit']);
    }    
}
