<?php

namespace Database\Seeders;

use App\Models\KategoriBantuan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Akun untuk login (email: test@example.com, password: password)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Kategori bantuan
        foreach (['Bencana Alam', 'Pendidikan', 'Kesehatan', 'Sosial'] as $nama) {
            KategoriBantuan::firstOrCreate(['nama' => $nama]);
        }
    }
}