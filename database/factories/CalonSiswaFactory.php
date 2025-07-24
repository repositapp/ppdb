<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalonSiswa>
 */
class CalonSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_pendaftaran' => 'PSB2025' . $this->faker->unique()->numberBetween(1000, 9999),
            'nama_lengkap' => $this->faker->name(),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nik' => $this->faker->unique()->numerify('################'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-15 years'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'asal_sekolah' => $this->faker->company() . ' School',
            'tahun_lulus' => $this->faker->randomElement(['2022', '2023', '2024', '2025']),
            'nama_ayah' => $this->faker->name('male'),
            'nama_ibu' => $this->faker->name('female'),
            'pekerjaan_ayah' => $this->faker->randomElement(['Petani', 'PNS', 'Wiraswasta']),
            'pekerjaan_ibu' => $this->faker->randomElement(['Ibu Rumah Tangga', 'Guru', 'Pedagang']),
            'nilai_un' => $this->faker->randomFloat(2, 50, 100),
            'nilai_raport' => $this->faker->randomFloat(2, 50, 100),
            'status' => $this->faker->randomElement(['pending', 'diterima', 'ditolak']),
        ];
    }
}
