<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingGym extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    
    protected $fillable = [
        'nomor_bookingG',
        'tanggal_bookingG',
        'id_member',
        'waktu',
        'status_bookingG',
    ];
    
    public function parentMember(){
        return $this->hasOne('App\Models\Member','id','id_member');
    }    
}
