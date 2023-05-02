<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index(Request $request)
    {
        if($request->has('search')){
            $member = Member::where('nama_member','LIKE','%'.$request->search.'%')
                        ->orWhere('email_member','LIKE','%'.$request->search.'%')
                        ->orWhere('telepon_member','LIKE','%'.$request->search.'%')
                        ->orWhere('jenis_kelamin_member','LIKE','%'.$request->search.'%')
                        ->orWhere('tanggal_lahir_member','LIKE','%'.$request->search.'%')
                        ->orWhere('alamat_member','LIKE','%'.$request->search.'%')
                        ->orWhere('nomor_member','LIKE','%'.$request->search.'%')
                        ->paginate(5);
        }else{
            $member = Member::latest()->paginate(5);
        }

        return view('member.index', compact('member'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('member.create');
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
            'nama_member' => 'required',
            'email_member' => 'required',
            'telepon_member' => 'required',
            'jenis_kelamin_member' => 'required',
            'tanggal_lahir_member' => 'required',
            'alamat_member' => 'required'
        ]);

        $year = date('y');
        $month = date('m');
        $ym = $year.'.'.$month.'.';
        $memberAkhir = Member::orderby('id', 'desc')->first();
        $nomorUrut = $memberAkhir ? $memberAkhir->id : 0;        
        $nomor_member = $ym . $nomorUrut + 1;

        $password = date("d/m/Y", strtotime($request->tanggal_lahir_member));

        //Fungsi Simpan Data ke dalam Database
        Member::create([
            'nomor_member' => $nomor_member,
            'nama_member' => $request->nama_member,
            'email_member' => $request->email_member,
            'telepon_member' => $request->telepon_member,
            'jenis_kelamin_member' => $request->jenis_kelamin_member,
            'tanggal_lahir_member' => $request->tanggal_lahir_member,
            'alamat_member' => $request->alamat_member,
            'password' => $password
        ]);
            
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id){
        $member = Member::whereId($id)->first();
        return view('member.edit')->with('member', $member);
    }    

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_member' => 'required',
            'email_member' => 'required',
            'telepon_member' => 'required',
            'jenis_kelamin_member' => 'required',
            'tanggal_lahir_member' => 'required',
            'alamat_member' => 'required'
        ]);

        $member = Member::whereId($id)->first();
        $member->update($request->all());

        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect(route('member.index'))->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function show($id){
        $member = Member::whereId($id)->first();
        return view('member.cetak')->with('member', $member);
    }
    
    public function resetPassword($id){
        $member = Member::whereId($id)->first();
        $passwordBaru = date("d/m/Y", strtotime($member->tanggal_lahir_member));
        $member->update(['password' => $passwordBaru]);

        return redirect()->route('member.index')->with(['success' => 'Password Berhasil Direset']);
    }
}
