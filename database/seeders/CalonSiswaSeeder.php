<?php

namespace Database\Seeders;

use App\Models\Calonsiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalonSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calonsiswa::factory(20)->create();
    }
}
