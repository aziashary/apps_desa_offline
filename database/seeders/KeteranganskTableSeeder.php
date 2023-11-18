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
            'id_kodesk' => 1,
            'detail_keterangansk' => json_encode([
                'no_sk' => 'I8',
                'nik' => 'F14',
                'warga' => [
                    [
                    'nama_warga' => 'F13',
                    'jenis_kelamin' => 'F14',
                    'tempat_lahir' => 'F15',
                    'tanggal_lahir' => 'G15',
                    'alamat' => 'F18',
                    'jenis_pekerjaan' => 'F16',
                    'agama' => 'F17',
                    ],
                ],
                'tanggal' => 'J27',
                'ttd_kepala' => 'G34',
                'jabatan' => 'G28',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'F22',
                'keterangan_2' => 'F33',
            ])
        ]);

        Keterangansk::create([
            'kode_sk' => 140,
            'id_kodesk' => 2,
            'detail_keterangansk' => json_encode([
                'no_sk' => 'E8',
                'warga' => [
                    [
                        'nik' => 'F14',
                        'nama_warga' => 'F13',
                        'jenis_kelamin' => 'F14',
                        'tempat_lahir' => 'F15',
                        'tanggal_lahir' => 'H15',
                        'alamat' => 'F18',
                        'jenis_pekerjaan' => 'F16',
                        'agama' => 'F17',
                    ],
                ],
                'tanggal' => 'J28',
                'ttd_kepala' => 'G33',
                'jabatan' => 'G28',
            ]),
            'keterangan' => json_encode([
                'keterangan_1' => 'F22',
                'keterangan_2' => 'F23',
            ])
        ]);
    }
}
