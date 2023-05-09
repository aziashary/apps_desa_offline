<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kodesk;
use Illuminate\Support\Facades\Hash;

class KodeskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kodesk::create([
            'kode_sk' => 510,
            'jenis_sk' => 'Surat Keterangan Usaha',
            'singkatan_sk'=>'SKU',
            'keterangan_1'=>'Jenis Usaha',
            'keterangan_2' => 'Alamat Usaha',
            'file_name' => 'sku.xlsx',
            'url_print' => "plugin\xls\sku.xlsx"

        ]);

        Kodesk::create([
            'kode_sk' => 140,
            'jenis_sk' => 'Surat Keterangan Keluarga Miskin',
            'singkatan_sk'=>'SKKM',
            'keterangan_1'=>'Keterangan Surat',
            'keterangan_2' => 'Usulan Surat',
            'file_name' => 'skkm.xlsx',
            'url_print' => "plugin\xls\skkm.xlsx"
        ]);
    }
}
