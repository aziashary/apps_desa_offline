<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    use HasFactory;

    protected $table = 'sk';
    
    protected $fillable = [
        'id_sk',
        'kode_sk',
        'jenis_sk',
        'no_sk',
        'id_warga',
        'keterangan_1',
        'keterangan_2',
        'keterangan_3',
        'keterangan_4'
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'id_warga', 'id_warga');
    }
    public function sks()
    {
        return $this->hasOne('App\Models\Kodesk', 'kode_sk', 'kode_sk');
    }
}
