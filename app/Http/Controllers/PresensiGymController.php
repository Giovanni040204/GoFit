<?php

namespace App\Http\Controllers;

use App\Models\BookingGym;
use App\Models\PresensiGym;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiGymController extends Controller
{
    public function index(){
        $bookingGym = BookingGym::where('status_bookingG','=',0)->get();

        $presensi = PresensiGym::all();

        return view('presensiGym.index', compact('bookingGym','presensi'));
    }

    /**
    * create
    *
    * @return void
    */
    public function store($id)
    {
        $tanggal = Carbon::now();

        $bookingGym = BookingGym::whereId($id)->first();
        //Fungsi Simpan Data ke dalam Database
        PresensiGym::create([
            'nomor_presensi' => $bookingGym->nomor_bookingG,
            'tanggal_presensi' => $tanggal->addHour(7),
            'id_member' => $bookingGym->id_member,
            'waktu' => $bookingGym->waktu
        ]);

        $bookingGym->update([
            'status_bookingG' => 1             
        ]);
            
        return redirect()->route('presensiGym.index')->with(['success' => 'Booking Berhasil Dikonfirmasi']);
    }
    
    public function cetak($id){
        $presensiGym = PresensiGym::whereId($id)->first();
        return view('presensiGym.cetak')->with('presensiGym', $presensiGym);        
    }    
}
