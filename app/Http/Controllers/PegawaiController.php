<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $pegawai = Pegawai::where('nama_pegawai','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $pegawai = Pegawai::latest()->paginate(5);
        }

        return view('pegawai.index', compact('pegawai'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('pegawai.create');
    }

    public function search(Request $request){
        if($request->has('search')){
            $pegawai = Pegawai::where('nama','LIKE','%',$request->search,'%')->get();
        }else{
            $pegawai = Pegawai::all();
        }

        return view('pegawai.index', compact('pegawai'));
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
            'nama_pegawai' => 'required',
            'peran_pegawai' => 'required',
            'email_pegawai' => 'required',
            'telepon_pegawai' => 'required',
            'jenis_kelamin_pegawai' => 'required',
            'tanggal_lahir_pegawai' => 'required',
            'alamat_pegawai' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'peran_pegawai' => $request->peran_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'telepon_pegawai' => $request->telepon_pegawai,
            'jenis_kelamin_pegawai' => $request->jenis_kelamin_pegawai,
            'tanggal_lahir_pegawai' => $request->tanggal_lahir_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai
        ]);
            
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        $pegawai = Pegawai::whereId($id)->first();
        return view('pegawai.edit')->with('pegawai', $pegawai);
    }    

    public function update(Request $request, $id){
        $pegawai = Pegawai::whereId($id)->first();
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect(route('pegawai.index'))->with(['success' => 'Data Berhasil Dihapus']);
    }  
}


