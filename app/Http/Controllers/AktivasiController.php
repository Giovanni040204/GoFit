<?php

namespace App\Http\Controllers;

use App\Models\Aktivasi;
use App\Models\Member;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AktivasiController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $aktivasi = Aktivasi::latest()->paginate(10);
        //render view with posts
        return view('aktivasi.index', compact('aktivasi'));
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
        return view('aktivasi.create', compact('pegawai'))->with('member', $member);
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

        if($request->jumlah_bayar < 3000000){
            return redirect()->route('member.index')->with(['error' => 'Uang Yang Dibayar Masih Kurang']);
        }

        $kembalian = $request->jumlah_bayar - 3000000;

        $year = date('y');
        $month = date('m');
        $ym = $year.'.'.$month.'.';
        $aktivasiAkhir = Aktivasi::orderby('id', 'desc')->first();
        $nomorUrut = $aktivasiAkhir ? $aktivasiAkhir->id : 0;        
        $nomor_aktivasi = $ym . $nomorUrut + 1;

        $tanggal_aktivasi = Carbon::now();
        $masa_berlaku_aktivasi = date('Y-m-d', strtotime('+1 year', strtotime($tanggal_aktivasi)));

        $member = Member::whereId($id)->first();
        $member->update(['status_member' => 'Aktif']);

        //Fungsi Simpan Data ke dalam Database
        Aktivasi::create([
            'nomor_aktivasi' => $nomor_aktivasi,
            'tanggal_aktivasi' => $tanggal_aktivasi,
            'masa_berlaku_aktivasi' => $masa_berlaku_aktivasi,
            'id_pegawai' => $request->id_pegawai,
            'id_member' => $id,
            'status_aktivasi' => 'Aktif'
        ]);

        $aktivasi = Aktivasi::where('id_member','=',$id)->first();
        return view('aktivasi.cetak')->with('aktivasi', $aktivasi);
            
        // return redirect()->route('aktivasi.index')->with(['success' => 'Aktivasi Berhasil Dilakukan  Kembalian = '.$kembalian]);
    }

    public function show($id){
        $aktivasi = Aktivasi::whereId($id)->first();
        return view('aktivasi.cetak')->with('aktivasi', $aktivasi);
    }
}
