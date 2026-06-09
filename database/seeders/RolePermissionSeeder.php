<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin', 'slug' => 'super_admin', 'description' => 'Full system access'],
            ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Administrative access'],
            ['name' => 'Instructor', 'slug' => 'instructor', 'description' => 'Course creation and management'],
            ['name' => 'Student', 'slug' => 'student', 'description' => 'Learning access'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['slug' => $role['slug']], $role);
        }

        $permissions = [
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'group' => 'users'],
            ['name' => 'Manage Courses', 'slug' => 'manage_courses', 'group' => 'courses'],
            ['name' => 'Approve Courses', 'slug' => 'approve_courses', 'group' => 'courses'],
            ['name' => 'Create Courses', 'slug' => 'create_courses', 'group' => 'courses'],
            ['name' => 'Manage Quizzes', 'slug' => 'manage_quizzes', 'group' => 'quizzes'],
            ['name' => 'Manage Certificates', 'slug' => 'manage_certificates', 'group' => 'certificates'],
            ['name' => 'Manage Payments', 'slug' => 'manage_payments', 'group' => 'payments'],
            ['name' => 'Manage Blog', 'slug' => 'manage_blog', 'group' => 'content'],
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'group' => 'system'],
            ['name' => 'View Reports', 'slug' => 'view_reports', 'group' => 'reports'],
            ['name' => 'View Audit Logs', 'slug' => 'view_audit_logs', 'group' => 'system'],
            ['name' => 'Manage Notifications', 'slug' => 'manage_notifications', 'group' => 'system'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['slug' => $perm['slug']], $perm);
        }

        $superAdmin = Role::where('slug', 'super_admin')->first();
        $superAdmin->permissions()->sync(Permission::pluck('id'));

        $admin = Role::where('slug', 'admin')->first();
        $admin->permissions()->sync(
            Permission::whereIn('slug', [
                'manage_users', 'manage_courses', 'approve_courses',
                'manage_quizzes', 'manage_certificates', 'manage_payments',
                'manage_blog', 'view_reports', 'manage_notifications',
            ])->pluck('id')
        );

        $instructor = Role::where('slug', 'instructor')->first();
        $instructor->permissions()->sync(
            Permission::whereIn('slug', [
                'create_courses', 'manage_quizzes', 'manage_certificates',
            ])->pluck('id')
        );
    }
}
