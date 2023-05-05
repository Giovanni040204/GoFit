<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivasi extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_aktivasi',        
        'tanggal_aktivasi',
        'masa_berlaku_aktivasi',
        'id_pegawai',
        'id_member',
    ];
    
    public function parentPegawai(){
        return $this->hasOne('App\Models\Pegawai','id','id_pegawai')->withDefault([
            'nama_pegawai' => 'Tidak Ada',
        ]);;
    }

    public function parentMember(){
        return $this->hasOne('App\Models\Member','id','id_member')->withDefault([
            'nama_member' => 'Tidak Ada',
        ]);;
    }
}
