<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            DB::table('logins')->insert([
                'username' => 'user_' . ($i + 1),
                'password' => bcrypt('password123'),
                'tanggal_login' => now(),
            ]);
        }
    }
}
