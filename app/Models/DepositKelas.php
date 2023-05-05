<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositKelas extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_depositK',        
        'tanggal_depositK',
        'masa_berlaku_depositK',
        'jenis_depositK',
        'jumlah_depositK',
        'bonus_depositK',
        'bayar_depositK',
        'sisa_depositK',
        'id_pegawai',
        'id_member',
        'id_kelas',
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
    
    public function parentKelas(){
        return $this->hasOne('App\Models\Kelas','id','id_kelas')->withDefault([
            'nama_kelas' => 'Tidak Ada',
            'harga_kelas' => 0,
        ]);;
    }
}
