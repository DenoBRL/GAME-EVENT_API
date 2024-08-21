<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'surname' => 'admin',
            'name_user' => 'admin',
            'pseudo' => 'admin',
            'image_profile' => 'user.jpg',
            'date_of_birth' => '1996-10-06',
            'password' => Hash::make('Admin1234!'),
            'email' => 'admin@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        User::create([
            'surname' => 'user',
            'name_user' => 'user',
            'pseudo' => 'user',
            'image_profile' => 'user.jpg',
            'date_of_birth' => '1996-10-06',
            'password' => Hash::make('User1234!'),
            'email' => 'user@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        User::factory(8)->create();
    }
}
