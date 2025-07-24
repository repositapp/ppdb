<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aktivitas_log>
 */
class Aktivitas_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'aktivitas' => $this->faker->randomElement(['Login', 'Verifikasi Siswa', 'Update Status', 'Input Pengumuman']),
            'waktu' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
