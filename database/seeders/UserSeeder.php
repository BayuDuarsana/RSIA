<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil beberapa unit dan jabatan
        $units = Unit::pluck('id');
        $jabatans = Jabatan::pluck('id');

        // Tambahkan data karyawan dummy dengan relasi
        for ($i = 0; $i < 10; $i++) {
            $unitId = $units->random();
            $jabatanIds = $jabatans->random(rand(1, 2))->toArray();

            User::create([
                'nama' => 'Karyawan ' . ($i + 1),
                'username' => 'username' . ($i + 1),
                'password' => ('password123'),
                'unit_id' => $unitId,
                'tanggal_bergabung' => now(),
            ])->jabatan()->attach($jabatanIds);
        }
    }
}
