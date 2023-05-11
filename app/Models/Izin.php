<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'id_instruktur',
        'id_jadwalHarian',
        'keterangan_izin',
        'status_izin',
        'konfirmasi_izin',
    ];
    
    public function parentJadwalHarian(){
        return $this->hasOne('App\Models\JadwalHarian','id','id_jadwalHarian')->withDefault([
            'nama_kelas' => 'Tidak Ada',
        ]);;
    }

    public function parentInstruktur(){
        return $this->hasOne('App\Models\Instruktur','id','id_instruktur')->withDefault([
            'nama_instruktur' => 'Tidak Ada',
        ]);;
    } 
}
