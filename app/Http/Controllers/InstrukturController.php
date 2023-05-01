<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $instruktur = Instruktur::where('nama_instruktur','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $instruktur = Instruktur::latest()->paginate(5);
        }

        return view('instruktur.index', compact('instruktur'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('instruktur.create');
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
            'nama_instruktur' => 'required',
            'email_instruktur' => 'required',
            'telepon_instruktur' => 'required',
            'jenis_kelamin_instruktur' => 'required',
            'tanggal_lahir_instruktur' => 'required',
            'alamat_instruktur' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Instruktur::create([
            'nama_instruktur' => $request->nama_instruktur,
            'email_instruktur' => $request->email_instruktur,
            'telepon_instruktur' => $request->telepon_instruktur,
            'jenis_kelamin_instruktur' => $request->jenis_kelamin_instruktur,
            'tanggal_lahir_instruktur' => $request->tanggal_lahir_instruktur,
            'alamat_instruktur' => $request->alamat_instruktur
        ]);
            
        return redirect()->route('instruktur.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        $instruktur = Instruktur::whereId($id)->first();
        return view('instruktur.edit')->with('instruktur', $instruktur);
    }    

    public function update(Request $request, $id){
        $instruktur = Instruktur::whereId($id)->first();
        $instruktur->update($request->all());

        return redirect()->route('instruktur.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        Instruktur::find($id)->delete();
        return redirect(route('instruktur.index'))->with(['success' => 'Data Berhasil Dihapus']);
    }
}
