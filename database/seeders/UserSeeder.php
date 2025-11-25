<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => env('DEFAULT_USER_NAME', 'Hannes Tamm'),
            'email' => env('DEFAULT_USER_EMAIL', 'hanetamm@gmail.com'),
            'password' => env('DEFAULT_USER_PASSWORD_HASH', bcrypt('Mingiparool')),
        ]);
    }
}
