<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;

    protected $table = 'sku';
    
    protected $fillable = [
        'no_sku',
        'id_warga',
        'jenis_usaha',
        'alamat_usaha',
    ];

    public function wargas()
    {
        return $this->hasOne('App\Models\Warga', 'id_warga', 'id_warga');
    }
}
