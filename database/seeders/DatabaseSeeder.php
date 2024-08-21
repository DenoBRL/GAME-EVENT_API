<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Database\Seeders\KindSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\AddressSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\OpinionSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            GameSeeder::class,
            KindSeeder::class,
            AddressSeeder::class,
            EventSeeder::class,
            CommentSeeder::class,
            OpinionSeeder::class,
        ]);
    }
}
