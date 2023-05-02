<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'id_kelas',
        'id_instruktur',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function parentKelas(){
        return $this->hasOne('App\Models\Kelas','id','id_kelas')->withDefault([
            'nama_kelas' => 'Tidak Ada',
        ]);;
    }

    public function parentInstruktur(){
        return $this->hasOne('App\Models\Instruktur','id','id_instruktur')->withDefault([
            'nama_instruktur' => 'Tidak Ada',
        ]);;
    }
}
