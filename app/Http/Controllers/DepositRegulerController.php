<?php

namespace App\Http\Controllers;

use App\Models\DepositReguler;
use App\Models\Member;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositRegulerController extends Controller
{
    public function index()
    {
        //get posts
        $depositR = DepositReguler::latest()->paginate(10);
        //render view with posts
        return view('depositReguler.index', compact('depositR'));
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
        return view('depositReguler.create', compact('pegawai'))->with('member', $member);
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
            'jumlah_bayar' => 'required'
        ]);

        if($request->jumlah_bayar < 500000){
            return redirect()->route('member.index')->with(['error' => 'Minimal Deposit Adalah Rp.500.000,-']);
        }

        $year = date('y');
        $month = date('m');
        $ym = $year.'.'.$month.'.';
        $depositAkhir = DepositReguler::orderby('id', 'desc')->first();
        $nomorUrut = $depositAkhir ? $depositAkhir->id : 0;        
        $nomor_depositR = $ym . $nomorUrut + 1;

        $tanggal_depositR = Carbon::now();

        $bonusDepositR = 0;

        for($deposit = $request->jumlah_bayar; $deposit>=3000000;$deposit-=3000000){
            $bonusDepositR = $bonusDepositR + 300000;
        }

        $data = DepositReguler::where('id_member','=',$id)->get();
        $cek = $data->count();
            
        if($cek!=0){
            $data = DepositReguler::where('id_member','=',$id)->first();

            $sisaDepositR = $data->total_depositR;

            $total_depositR = $request->jumlah_bayar + $bonusDepositR + $sisaDepositR;

            $data->update([
                'nomor_depositR' => $nomor_depositR,
                'tanggal_depositR' => $tanggal_depositR,
                'bayar_depositR' => $request->jumlah_bayar,
                'bonus_depositR' => $bonusDepositR,
                'sisa_depositR' => $sisaDepositR,
                'total_depositR' => $total_depositR,
                'id_pegawai' => $request->id_pegawai,
                'id_member' => $id                
            ]);
        }else{
            $sisaDepositR = 0;

            $total_depositR = $request->jumlah_bayar + $bonusDepositR + $sisaDepositR;
        
            DepositReguler::create([
                'nomor_depositR' => $nomor_depositR,
                'tanggal_depositR' => $tanggal_depositR,
                'bayar_depositR' => $request->jumlah_bayar,
                'bonus_depositR' => $bonusDepositR,
                'sisa_depositR' => $sisaDepositR,
                'total_depositR' => $total_depositR,
                'id_pegawai' => $request->id_pegawai,
                'id_member' => $id
            ]); 
        }        
 
        return redirect()->route('depositReguler.index')->with(['success' => 'Deposit Reguler Berhasil Dilakukan']);
    }
    
    public function show($id){
        $depositR = DepositReguler::whereId($id)->first();
        return view('depositReguler.cetak')->with('depositR', $depositR);
    }
}
