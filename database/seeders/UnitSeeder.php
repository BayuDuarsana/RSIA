<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create(['nama' => 'Unit A']);
        Unit::create(['nama' => 'Unit B']);
        Unit::create(['nama' => 'Unit C']);
    }
}
