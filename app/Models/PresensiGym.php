<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiGym extends Model
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
        'waktu',
    ]; 

    public function parentMember(){
        return $this->hasOne('App\Models\Member','id','id_member');
    }     
}
