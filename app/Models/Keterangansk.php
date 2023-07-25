<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangansk extends Model
{
    use HasFactory;
    protected $table = 'keterangansk';
    
    protected $fillable = [
        'id_keterangansk',
        'kode_sk',
        'no_sk',
        'nik',
        'nama_warga',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_pekerjaan',
        'agama',
        'keterangan_1',
        'keterangan_2',
        'keterangan_3',
        'keterangan_4',
        'tanggal',
        'ttd_pengaju',
        'ttd_kepala',
        'jabatan',
    ]; 
    public function sks()
    {
        return $this->hasOne('App\Models\Kodesk', 'kode_sk', 'kode_sk');
    }
}
