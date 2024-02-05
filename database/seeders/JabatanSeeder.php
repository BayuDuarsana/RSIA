<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(['nama' => 'Manager']);
        Jabatan::create(['nama' => 'Programmer']);
        Jabatan::create(['nama' => 'Designer']);
    }
}
