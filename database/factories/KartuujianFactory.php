<?php

namespace Database\Factories;

use App\Models\Calonsiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kartuujian>
 */
class KartuujianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calonsiswa_id' => Calonsiswa::inRandomOrder()->first()->id,
            'no_ujian' => 'UJIAN2025' . $this->faker->unique()->numberBetween(1000, 9999),
            'tanggal_ujian' => $this->faker->dateTimeBetween('now', '+30 days'),
            'lokasi' => 'SMAN 2 Batauga',
            'ruang' => 'Ruang ' . $this->faker->numberBetween(1, 5),
        ];
    }
}
