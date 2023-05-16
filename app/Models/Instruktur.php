<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_instruktur',
        'nama_instruktur',
        'email_instruktur',
        'telepon_instruktur',
        'jenis_kelamin_instruktur',
        'tanggal_lahir_instruktur',
        'alamat_instruktur',
        'jumlah_terlambat',
        'tanggal_reset',
    ];    
}
