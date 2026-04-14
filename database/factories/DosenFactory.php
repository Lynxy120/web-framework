<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => $this->faker->numerify('08##########'),
            'prodi' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro']),
            'alamat' => $this->faker->address(),
        ];
    }
}
