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
        //get posts
        $depositK = DepositKelas::latest()->paginate(10);
        //render view with posts
        return view('depositKelas.index', compact('depositK'));
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
            'jumlah_uang' => 'required',
        ]);

        if($request->jumlah_uang < $request->jumlah_bayar){
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

        if($request->jenis_deposit == '1'){
            $jenis_depositK = 'bayar 5 gratis 1';
            $masa_berlaku_depositK = date('Y-m-d', strtotime('+1 month', strtotime($tanggal_depositK)));
            $jumlah_depositK = 5;
            $bonus_depositK = 1;
            $sisa_depositK = 6;
        }else{
            $jenis_depositK = 'bayar 10 gratis 3';
            $masa_berlaku_depositK = date('Y-m-d', strtotime('+2 month', strtotime($tanggal_depositK)));
            $jumlah_depositK = 10;
            $bonus_depositK = 3;
            $sisa_depositK = 13;
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
                'bayar_depositK' => $request->jumlah_bayar,
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
                'jenis_depositK' => $request->jenis_depositK,
                'jumlah_depositK' => $jumlah_depositK,
                'bonus_depositK' => $bonus_depositK,
                'bayar_depositK' => $request->jumlah_bayar,
                'sisa_depositK' => $sisa_depositK,
                'id_pegawai' => $request->id_pegawai,
                'id_member' => $id,
                'id_pegawai' => $request->id_kelas, 
            ]); 
        }        
 
        return redirect()->route('depositKelas.index')->with(['success' => 'Deposit Kelas Berhasil Dilakukan']);
    }
    
    public function show($id){
        $depositK = DepositKelas::whereId($id)->first();
        return view('depositKelas.cetak')->with('depositK', $depositK);
    }
}
