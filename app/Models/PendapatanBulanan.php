<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanBulanan extends Model
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
        'aktivasi',
        'deposit',
        'total',
    ];      
}
