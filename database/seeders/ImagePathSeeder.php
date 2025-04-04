<?php

namespace Database\Seeders;

use App\Models\ImagePath;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagePathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImagePath::factory()->count(5)->create();
    }
}
