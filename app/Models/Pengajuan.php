<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    
    protected $fillable = [
        'id_pengajuan',
        'kode_sk',
        'jenis_pengajuan',
        'no_pengajuan',
        'id_warga',
        'status_pengajuan',
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

          