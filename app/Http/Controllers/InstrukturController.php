<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Jadwal;
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
            $instruktur = Instruktur::latest()->where('nama_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('email_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('telepon_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('jenis_kelamin_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('tanggal_lahir_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('alamat_instruktur','LIKE','%'.$request->search.'%')
                            ->orWhere('nomor_instruktur','LIKE','%'.$request->search.'%')
                            ->paginate(5);
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
        $jenisKelamin = ['Laki-laki','Perempuan'];
        return view('instruktur.create', compact('jenisKelamin'));
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

        $year = date('Y');
        $month = date('m');
        $ym = $year.$month.'.';
        $instrukturAkhir = Instruktur::orderby('id', 'desc')->first();
        $nomorUrut = $instrukturAkhir ? $instrukturAkhir->id : 0;        
        $nomor_instruktur = $ym . $nomorUrut + 1;        

        //Fungsi Simpan Data ke dalam Database
        Instruktur::create([
            'nomor_instruktur' => $nomor_instruktur,
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
        $jenisKelamin = ['Laki-laki','Perempuan'];
        return view('instruktur.edit', compact('jenisKelamin'))->with('instruktur', $instruktur);
    }    

    public function update(Request $request, $id){

        $this->validate($request, [
            'nama_instruktur' => 'required',
            'email_instruktur' => 'required',
            'telepon_instruktur' => 'required',
            'jenis_kelamin_instruktur' => 'required',
            'tanggal_lahir_instruktur' => 'required',
            'alamat_instruktur' => 'required'
        ]);

        $instruktur = Instruktur::whereId($id)->first();
        $instruktur->update($request->all());

        return redirect()->route('instruktur.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        $data = Jadwal::where('id_instruktur','=',$id)->get();
        $cek = $data->count();

        if($cek!=0){
            return redirect(route('instruktur.index'))->with(['error' => 'Instruktur Masih Mempunyai Jadwal Kelas']);
        }else{
            Instruktur::find($id)->delete();
            return redirect(route('instruktur.index'))->with(['success' => 'Data Berhasil Dihapus']);
        }
        
    }
}
