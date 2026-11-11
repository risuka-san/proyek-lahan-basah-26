<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Membuat atau memperbarui akun pengujian
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User']
        );

        // Menjalankan seeder level dan materi
        $this->call([
            LevelSeeder::class,
            MaterialSeeder::class,
        ]);
    }
}
