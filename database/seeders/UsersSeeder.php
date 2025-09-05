<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@simarat.local'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin'), // ganti di produksi!
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );
        $admin->assignRole('admin');

        // Staff
        $staff = User::firstOrCreate(
            ['email' => 'staff@simarat.local'],
            [
                'name' => 'Petugas Arsip',
                'password' => Hash::make('staff'),
                'email_verified_at' => now(),
                'role' => 'staff',
            ]
        );
        $staff->assignRole('staff');

        // Viewer
        $viewer = User::firstOrCreate(
            ['email' => 'viewer@simarat.local'],
            [
                'name' => 'Viewer',
                'password' => Hash::make('viewer'),
                'email_verified_at' => now(),
                'role' => 'viewer',
            ]
        );
        $viewer->assignRole('viewer');
    }
}
