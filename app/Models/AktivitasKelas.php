<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasKelas extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'bulan',        
        'tahun',
        'id_kelas',
        'id_instruktur',
        'jumlah_peserta',
        'jumlah_libur',
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
