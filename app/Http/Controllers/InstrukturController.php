<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Jadwal;
use Carbon\Carbon;
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
            $instruktur = Instruktur::latest()->paginate(10);
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
            'alamat_instruktur' => $request->alamat_instruktur,
            'jumlah_terlambat' => 0
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

    public function indexTerlambat()
    {
        $instruktur = Instruktur::all();
        return view('instruktur.terlambat', compact('instruktur'));
    }

    public function resetTerlambat(){
        $harini = Carbon::now()->format('Y-m-d');
        $instruktur = Instruktur::all();
        $cek = $instruktur->count();

        
        if($harini != $instruktur[0]->tanggal_reset && $instruktur[0]->tanggal_reset != NULL){
            return redirect(route('instruktur.indexTerlambat'))->with(['error' => 'Terlambat Instruktur Hanya Bisa Direset 1 Bulan 1 Kali']);
        }else{
            for($i=0;$i<$cek;$i++){
                $sekarang = Carbon::now();
                $tanggal_reset = date('Y-m-d', strtotime('+1 month', strtotime($sekarang)));

                $instruktur[$i]->update([
                    'jumlah_terlambat' => 0,
                    'tanggal_reset' => $tanggal_reset
                ]);
            }
        }    

        return redirect(route('instruktur.indexTerlambat'))->with(['success' => 'Terlambat Instruktur Berhasil Direset']);
    }
}
