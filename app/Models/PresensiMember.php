<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMember extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_presensi',
        'tanggal_presensi',
        'id_member',
        'id_jadwalHarian',
        'id_depositReguler',
        'id_depositKelas',
    ];
    
    public function parentJadwalHarian(){
        return $this->hasOne('App\Models\JadwalHarian','id','id_jadwalHarian');
    }

    public function parentMember(){
        return $this->hasOne('App\Models\Member','id','id_member');
    }

    public function parentDepositReguler(){
        return $this->hasOne('App\Models\DepositReguler','id','id_depositReguler');
    }

    public function parentDepositKelas(){
        return $this->hasOne('App\Models\DepositKelas','id','id_depositKelas');
    }    
}
