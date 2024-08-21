<?php

namespace Database\Seeders;

use App\Models\Opinion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opinion::factory(10)->create();
    }
}
