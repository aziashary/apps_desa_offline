<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodesk extends Model
{
    use HasFactory;

    protected $table = 'kodesk';
    
    protected $fillable = [
        'id_kodesk',
        'kode_sk',
        'jenis_sk',
        'singkatan_sk'
    ]; 
}
