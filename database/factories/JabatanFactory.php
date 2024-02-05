<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jabatan;

class JabatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Jabatan::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
        ];
    }
}
