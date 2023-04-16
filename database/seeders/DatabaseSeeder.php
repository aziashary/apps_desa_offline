<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
    \App\Models\SKKM::factory()->times(100)->create();
    \App\Models\SK::factory()->times(100)->create();
    \App\Models\Warga::factory()->times(1000)->create();
    $this->call(UserTableSeeder::class);
    $this->call(KodeskTableSeeder::class);
    }
}
