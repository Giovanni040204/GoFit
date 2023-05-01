<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    // protected $dates = ['tanggal_lahir_member'];

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_member',
        'nama_member',
        'email_member',
        'telepon_member',
        'jenis_kelamin_member',
        'tanggal_lahir_member',
        'alamat_member',
        'password',
    ];

    
}
