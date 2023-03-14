<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    
    protected $fillable = [
        'id_pengajuan',
        'no_pengajuan',
        'id_warga',
        'surat_pengajuan',
        'subjek_pengajuan',
        'keterangan_pengajuan',
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'id_warga', 'id_warga');
    }
}

          