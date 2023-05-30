<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinerjaInstruktur extends Model
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
        'id_instruktur',
        'jumlah_hadir',
        'jumlah_libur',
        'waktu_terlambat'
    ];

    public function parentInstruktur(){
        return $this->hasOne('App\Models\Instruktur','id','id_instruktur')->withDefault([
            'nama_instruktur' => 'Tidak Ada',
        ]);;
    }     
}
