<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

use App\Http\Resources\IzinResource;
use App\Models\JadwalHarian;
use Illuminate\Support\Facades\Validator;
use Lcobucci\JWT\Validation\Constraint\ValidAt;

class IzinController extends Controller
{
    public function indexWeb(){
        $izinBelum = Izin::latest()->where('status_izin','=','0')->get();

        $izinSudah = Izin::latest()->where('status_izin','=','1')->get();

        return view('izin.index', compact('izinSudah','izinBelum'));
    }

    public function index(){
        $izin = Izin::all();

        if(count($izin) > 0){
            // return response([
            //     'status' => 200,
            //     'error' => "false",
            //     'message' => '',
            //     'totaldata' => count($izin),
            //     'data' => $izin,
            // ], 200);

            return response($izin);

        }

        

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }

    public function show($id){
        $izin = Izin::all();

        if(count($izin) > 0){
            return response([
                'status' => 200,
                'error' => "false",
                'message' => '',
                'totaldata' => count($izin),
                'data' => $izin,
            ], 200);
        }

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400);
    }
    
    public function create()
    {
        return view('izin.create');
    }

    public function store(Request $request)
    {
        //Validasi Formulir
        $validator = Validator::make($request->all(), [
            'id_instruktur' => 'required',
            'id_jadwalHarian' => 'required',
            'keterangan_izin' => 'required',
            'status_izin' => 'required',
            'konfirmasi_izin' => 'required',
        ]); 

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //Fungsi Simpan Data ke dalam Database
        $izin = Izin::create([
            'id_instruktur' => $request->id_instruktur,
            'id_jadwalHarian' => $request->id_jadwalHarian,
            'keterangan_izin' => $request->keterangan_izin,
            'status_izin' => $request->status_izin,
            'konfirmasi_izin' => $request->konfirmasi_izin
        ]);
            
        return new IzinResource(true, 'Data Izin Berhasil Ditambahkan!', $izin);
    }

    public function edit($id){
        $izin = Izin::whereId($id)->first();
        return view('izin.edit')->with('izin', $izin);
    }
    
    public function updateWeb(Request $request, $id){

        $this->validate($request, [
            'id_instruktur' => 'required',
            'id_jadwalHarian' => 'required',
            'keterangan_izin' => 'required',
            'konfirmasi_izin' => 'required'
        ]);

        $izin = Izin::whereId($id)->first();
        $izin->update([
            'status_izin' => 1,
            'konfirmasi_izin' => $request->konfirmasi_izin
        ]);

        if($request->konfirmasi_izin == 'Diizinkan'){
            $jadwalHarian = JadwalHarian::whereId($izin->id_jadwalHarian)->first();
            $jadwalHarian->update([
                'status_jadwal' => 'Libur'
            ]);  
        }
        
        return redirect()->route('izin.indexWeb')->with(['success' => 'Berhasil Konfirmasi Izin']);
    }
}