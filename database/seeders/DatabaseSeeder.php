<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat daftar Peran (Role) di Koperasiku
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'anggota']);

        // 2. Membuat Akun Admin Pertama
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@koperasiku.com',
            'password' => Hash::make('password123'), // Sandi rahasia Anda
        ]);

        // 3. Menempelkan stiker 'admin' ke akun yang baru dibuat
        $admin->assignRole('admin');
    }
}
