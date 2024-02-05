<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Karyawan;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Karyawan::class;
    
     public function definition()
    {
        
        return [
            'nama' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password123'),
            'unit_id' => rand(1, 5),
            'tanggal_bergabung' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
