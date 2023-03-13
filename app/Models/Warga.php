<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    
    protected $fillable = [
        'nik',
        'nama_warga',
        'tempat_lahir',
        'tanggal_lahir',
        'RT',
        'RW',
        'desa',
        'alamat',
        'jenis_pekerjaan',
        'jenis_kelamin',
        'agama',
    ];
}
