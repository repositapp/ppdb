<?php

namespace Database\Seeders;

use App\Models\Kartuujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KartuUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kartuujian::factory(50)->create();
    }
}
