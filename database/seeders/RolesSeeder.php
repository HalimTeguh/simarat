<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $perms = [
            // letters
            'letters.view',
            'letters.create',
            'letters.update',
            'letters.delete',
            'letters.download',
            // categories
            'categories.view',
            'categories.create',
            'categories.update',
            'categories.delete',
            // users
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
        ];


        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p, 'guard_name' => 'web']);
        }

        $admin  = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $staff  = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'web']);
        $viewer = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);

        $admin->givePermissionTo($perms);
        $staff->givePermissionTo(['letters.view', 'letters.create', 'letters.update', 'letters.download', 'categories.view', 'categories.create', 'categories.update']);
        $viewer->givePermissionTo(['letters.view', 'letters.download']);
    }
}
