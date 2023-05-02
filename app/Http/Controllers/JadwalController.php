<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Instruktur;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $jadwal = Jadwal::latest()->paginate(10);
        //render view with posts
        return view('jadwal.index', compact('jadwal'));
    }
    /**
    * create
    *
    * @return void
    */

    public function create()
    {
        $kelas = Kelas::all();
        $instruktur = Instruktur::all();
        $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return view('jadwal.create', compact('kelas', 'instruktur', 'hari'));
    }

    /**
    * store
    *
    * @param Request $request
    * @return void
    */
    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'id_kelas' => 'required',
            'id_instruktur' => 'required',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);

        if($request->waktu_mulai > $request->waktu_selesai){
            return redirect()->route('jadwal.index')->with(['error' => 'Waktu Mulai Kelas Lebih Besar Dari Waktu Selesai']);
        }else{
            $data = Jadwal::where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->Where('waktu_mulai','<=',$request->waktu_mulai)->Where('waktu_selesai','>=',$request->waktu_mulai)->get();
            $cek = $data->count();
    
            if($cek!=0){
                return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
            }else{
                $data = Jadwal::where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->Where('waktu_mulai','<=',$request->waktu_selesai)->Where('waktu_selesai','>=',$request->waktu_selesai)->get();
                $cek = $data->count();

                if($cek!=0){
                    return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
                }else{
                    $data = Jadwal::where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->Where('waktu_mulai','>=',$request->waktu_mulai)->Where('waktu_selesai','<=',$request->waktu_selesai)->get();
                    $cek = $data->count();
                    if($cek!=0){
                        return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
                    }else{
                        //Fungsi Simpan Data ke dalam Database
                        Jadwal::create([
                            'id_kelas' => $request->id_kelas,
                            'id_instruktur' => $request->id_instruktur,
                            'hari' => $request->hari,
                            'waktu_mulai' => $request->waktu_mulai,
                            'waktu_selesai' => $request->waktu_selesai
                        ]);
            
                        return redirect()->route('jadwal.index')->with(['success' => 'Data Jadwal Berhasil Disimpan']);
                    }
                }
            } 
        }
    }

    public function edit($id){
        $kelas = Kelas::all();
        $instruktur = Instruktur::all();
        $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        $jadwal = Jadwal::whereId($id)->first();
        return view('jadwal.edit', compact('kelas','instruktur','hari'))->with('jadwal', $jadwal);
    }    

    public function update(Request $request, $id){

        if($request->waktu_mulai >= $request->waktu_selesai){
            return redirect()->route('jadwal.index')->with(['error' => 'Waktu Mulai Kelas Lebih Besar Atau Sama Dengan Waktu Selesai']);
        }else{
            $data = Jadwal::where('id','!=',$id)->where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->where('waktu_mulai','<=',$request->waktu_mulai)->where('waktu_selesai','>=',$request->waktu_mulai)->get();
            $cek = $data->count();
            
            if($cek!=0){
                return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
            }else{
                $data = Jadwal::where('id','!=',$id)->where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->where('waktu_mulai','<=',$request->waktu_selesai)->where('waktu_selesai','>=',$request->waktu_selesai)->get();
                $cek = $data->count();

                if($cek!=0){
                    return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
                }else{
                    $data = Jadwal::where('id','!=',$id)->where('id_instruktur','=',$request->id_instruktur)->where('hari','=',$request->hari)->where('waktu_mulai','>=',$request->waktu_mulai)->where('waktu_selesai','<=',$request->waktu_selesai)->get();
                    $cek = $data->count();
                    if($cek!=0){
                        return redirect()->route('jadwal.index')->with(['error' => 'Jadwal Instruktur Bertabrakan']);
                    }else{
                        $jadwal = Jadwal::whereId($id)->first();
                        $jadwal->update($request->all());
            
                        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diedit']);
                    }
                }
            }
        }
    }

    public function destroy($id)
    {
        Jadwal::find($id)->delete();
        return redirect(route('jadwal.index'))->with(['success' => 'Data Berhasil Dihapus']);
    }
}
