<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $kelas = Kelas::latest()->where('nama_kelas','LIKE','%'.$request->search.'%')
                        ->orWhere('harga_kelas','LIKE','%'.$request->search.'%')
                        ->paginate(5);
        }else{
            $kelas = Kelas::latest()->paginate(10);
        }

        return view('kelas.index', compact('kelas'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('kelas.create');
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
            'nama_kelas' => 'required',
            'harga_kelas' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'harga_kelas' => $request->harga_kelas
        ]);
            
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        $kelas = Kelas::whereId($id)->first();
        return view('kelas.edit')->with('kelas', $kelas);
    }    

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_kelas' => 'required',
            'harga_kelas' => 'required'
        ]);

        $kelas = Kelas::whereId($id)->first();
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        $data = Jadwal::where('id_kelas','=',$id)->get();
        $cek = $data->count();

        if($cek!=0){
            return redirect(route('kelas.index'))->with(['error' => 'Kelas Tersebut Masih Mempunyai Jadwal']);
        }else{
            Kelas::find($id)->delete();
            return redirect(route('kelas.index'))->with(['success' => 'Data Berhasil Dihapus']);
        }   
    }  
}
