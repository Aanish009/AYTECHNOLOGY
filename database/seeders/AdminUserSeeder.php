<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'super_admin')->first();

        User::firstOrCreate(
            ['email' => 'admin@fireacademy.in'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('FireAdmin@2026'),
                'role_id' => $adminRole->id,
                'is_active' => true,
                'is_approved' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
