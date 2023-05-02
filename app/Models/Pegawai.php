<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_pegawai',
        'nama_pegawai',
        'peran_pegawai',
        'email_pegawai',
        'telepon_pegawai',
        'jenis_kelamin_pegawai',
        'tanggal_lahir_pegawai',
        'alamat_pegawai',
    ];
}
