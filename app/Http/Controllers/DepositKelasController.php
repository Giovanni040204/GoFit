<?php

namespace App\Http\Controllers;

use App\Models\DepositKelas;
use App\Models\Kelas;
use App\Models\Member;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositKelasController extends Controller
{
    public function index()
    {
        $harini = Carbon::now()->format('Y-m-d');
        $reset = [];
        $a = 0;
        $b = 0;        

        $depositK = DepositKelas::all();
        $cek = $depositK->count(); 

        for($i=0;$i<$cek;$i++){
            if($depositK[$i]->masa_berlaku_depositK == $harini){
                $member = Member::whereId($depositK[$i]->id_member)->first();
                $reset[$a] = $member;
                $a++;
                if($depositK[$i]->sisa_depositK == 0){
                    $b = 0;
                }else{
                    $b = 1;
                }
            }
        }

        $depositK = DepositKelas::latest()->paginate(10);
        //render view with posts
        return view('depositKelas.index', compact('depositK','reset','a','b'));
    }

    /**
    * edit
    *
    * @return void
    */
    public function edit($id)
    {
        $member = Member::whereId($id)->first();
        $pegawai = Pegawai::all();
        $kelas = Kelas::all();
        return view('depositKelas.create', compact('pegawai','kelas'))->with('member', $member);
    }
    
    /**
    * store
    *
    * @param Request $request
    * @return void
    */
    public function update(Request $request, $id)
    {
        //Validasi Formulir
        $this->validate($request, [
            'id_pegawai' => 'required',
            'id_kelas' => 'required',
            'jenis_deposit' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $kelas = Kelas::whereId($request->id_kelas)->first();
        $harga = $kelas->harga_kelas * $request->jenis_deposit;

        if($harga > $request->jumlah_bayar){
            return redirect()->route('member.index')->with(['error' => 'Uang Yang Dimasukan Masih Kurang']);
        }

        $year = date('y');
        $month = date('m');
        $ym = $year.'.'.$month.'.';
        $depositAkhir = DepositKelas::orderby('id', 'desc')->first();
        $nomorUrut = $depositAkhir ? $depositAkhir->id : 0;        
        $nomor_depositK = $ym . $nomorUrut + 1;

        $tanggal_depositK = Carbon::now();
        $masa_berlaku_depositK = date('Y-m-d', strtotime('+1 month', strtotime($tanggal_depositK)));

        if($request->jenis_deposit == '5'){
            $jenis_depositK = 'bayar 5 gratis 1';
            $masa_berlaku_depositK = date('Y-m-d', strtotime('+1 month', strtotime($tanggal_depositK)));
            $jumlah_depositK = 5;
            $bonus_depositK = 1;
            $sisa_depositK = 6;
            $kelas = Kelas::whereId($request->id_kelas)->first();
            $bayar_deposit = $kelas->harga_kelas * 5;
        }else{
            $jenis_depositK = 'bayar 10 gratis 3';
            $masa_berlaku_depositK = date('Y-m-d', strtotime('+2 month', strtotime($tanggal_depositK)));
            $jumlah_depositK = 10;
            $bonus_depositK = 3;
            $sisa_depositK = 13;
            $kelas = Kelas::whereId($request->id_kelas)->first();
            $bayar_deposit = $kelas->harga_kelas * 10;
        }

        $data = DepositKelas::where('id_member','=',$id)->get();
        $cek = $data->count();
            
        if($cek!=0){
            $data = DepositKelas::where('id_member','=',$id)->first();

            $data->update([
                'nomor_depositK' => $nomor_depositK,
                'tanggal_depositK' => $tanggal_depositK,
                'masa_berlaku_depositK' => $masa_berlaku_depositK,
                'jenis_depositK' => $jenis_depositK,
                'jumlah_depositK' => $jumlah_depositK,
                'bonus_depositK' => $bonus_depositK,
                'bayar_depositK' => $bayar_deposit,
                'sisa_depositK' => $sisa_depositK,
                'id_pegawai' => $request->id_pegawai,
                'id_member' => $id,
                'id_kelas' => $request->id_kelas,                
            ]);
        }else{       
            DepositKelas::create([
                'nomor_depositK' => $nomor_depositK,
                'tanggal_depositK' => $tanggal_depositK,
                'masa_berlaku_depositK' => $masa_berlaku_depositK,
                'jenis_depositK' => $jenis_depositK,
                'jumlah_depositK' => $jumlah_depositK,
                'bonus_depositK' => $bonus_depositK,
                'bayar_depositK' => $bayar_deposit,
                'sisa_depositK' => $sisa_depositK,
                'id_pegawai' => $request->id_pegawai,
                'id_member' => $id,
                'id_kelas' => $request->id_kelas,  
            ]); 
        }
        
        $depositK = DepositKelas::where('id_member','=',$id)->first();
        return view('depositKelas.cetak')->with('depositK', $depositK);
 
        // return redirect()->route('depositKelas.index')->with(['success' => 'Deposit Kelas Berhasil Dilakukan']);
    }
    
    public function show($id){
        $depositK = DepositKelas::whereId($id)->first();
        return view('depositKelas.cetak')->with('depositK', $depositK);
    }

    public function resetDeposit(){
        $harini = Carbon::now()->format('Y-m-d');

        $depositK = DepositKelas::all();
        $cek = $depositK->count(); 

        for($i=0;$i<$cek;$i++){
            if($depositK[$i]->masa_berlaku_depositK == $harini){
                $data = DepositKelas::where('id_member','=',$depositK[$i]->id_member)->first();
                $data->update([
                    'sisa_depositK' => 0
                ]);
            }
        }

        return redirect(route('depositKelas.index'))->with(['success' => 'Berhasil Reset Deposit']);
    }
}
