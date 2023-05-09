<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keterangansk;
use Illuminate\Support\Facades\Hash;

class KeteranganskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keterangansk::create([
            'kode_sk' => 510,
            'no_sk' => 'I8',
            'nik' => 'F14',
            'nama_warga' => 'F13',
            'tempat_lahir' => 'F15',
            'tanggal_lahir' => 'G15',
            'alamat' => 'F18',
            'jenis_pekerjaan' => 'F16',
            'agama' => 'F17',
            'keterangan_1' => 'F22',
            'keterangan_2' => 'F33',
            'tanggal' => 'J27',
          

        ]);

        Keterangansk::create([
            'kode_sk' => 140,
            'no_sk' => 'I8',
            'nik' => 'F14',
            'nama_warga' => 'F13',
            'tempat_lahir' => 'F15',
            'tanggal_lahir' => 'G15',
            'alamat' => 'F18',
            'jenis_pekerjaan' => 'F16',
            'agama' => 'F17',
            'keterangan_1' => 'F22',
            'keterangan_2' => 'F33',
            'tanggal' => 'J27',
        ]);
    }
}
