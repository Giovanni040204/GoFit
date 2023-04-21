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
    public function index()
    {
        $pegawai = Pegawai::latest()->paginate(5);

    return view('pegawai.index', compact('pegawai'));
    }
}
