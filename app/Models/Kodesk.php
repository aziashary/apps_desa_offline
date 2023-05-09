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
        'singkatan_sk',
        'keterangan_1',
        'keterangan_2',
        'keterangan_3',
        'keterangan_4',
        'file_name',
        'url_print'

    ]; 

    public function kets()
    {
        return $this->hasOne('App\Models\Keterangansk', 'kode_sk', 'kode_sk');
    }
}
