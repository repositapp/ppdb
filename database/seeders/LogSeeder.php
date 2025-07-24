<?php

namespace Database\Seeders;

use App\Models\Aktivitas_log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aktivitas_log::factory(30)->create();
    }
}
