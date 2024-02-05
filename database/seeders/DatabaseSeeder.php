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
        \App\Models\Karyawan::factory(10)->create();
        \App\Models\Unit::factory(5)->create();
        \App\Models\Jabatan::factory(5)->create();
        \App\Models\Login::factory(200)->create();
    }
}
