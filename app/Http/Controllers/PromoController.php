<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $promo = Promo::latest()->where('judul_promo','LIKE','%'.$request->search.'%')
                        ->orWhere('jenis_promo','LIKE','%'.$request->search.'%')
                        ->orWhere('isi_promo','LIKE','%'.$request->search.'%')
                        ->paginate(5);
        }else{
            $promo = Promo::latest()->paginate(10);
        }

        return view('promo.index', compact('promo'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        $jenisPromo = ['Kelas Reguler','Kelas Paket'];
        return view('promo.create', compact('jenisPromo'));
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
            'judul_promo' => 'required',
            'jenis_promo' => 'required',
            'isi_promo' => 'required'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Promo::create([
            'judul_promo' => $request->judul_promo,
            'jenis_promo' => $request->jenis_promo,
            'isi_promo' => $request->isi_promo
        ]);
            
        return redirect()->route('promo.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        $promo = Promo::whereId($id)->first();
        $jenisPromo = ['Kelas Reguler','Kelas Paket'];
        return view('promo.edit', compact('jenisPromo'))->with('promo', $promo);
    }    

    public function update(Request $request, $id){
        $this->validate($request, [
            'judul_promo' => 'required',
            'jenis_promo' => 'required',
            'isi_promo' => 'required'
        ]);

        $promo = Promo::whereId($id)->first();
        $promo->update($request->all());

        return redirect()->route('promo.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        Promo::find($id)->delete();
        return redirect(route('promo.index'))->with(['success' => 'Data Berhasil Dihapus']);
    } 
}
