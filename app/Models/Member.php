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
        'status_member',
        'password',
    ];

    public function parentDepositR(){
        return $this->hasOne('App\Models\DepositReguler','id_member','id')->withDefault([
            'total_depositR' => 'Belum Melakukan Deposit',
        ]);;
    } 
    public function parentDepositK(){
        return $this->hasOne('App\Models\DepositKelas','id_member','id')->withDefault([
            'sisa_depositK' => 'Belum Melakukan Deposit',
        ]);;
    }
    
}
