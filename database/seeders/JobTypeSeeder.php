<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::factory()->createMany([['name' => 'Remote'], ['name' => 'Full-time'], ['name' => 'Part-time']]);
    }
}
