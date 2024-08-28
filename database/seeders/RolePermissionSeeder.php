<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'dashboard-view',
            'dashboard-admin-view',
            'dashboard-teacher-view',
            'dashboard-student-view',
            'account-management',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'teacher-list',
            'teacher-create',
            'teacher-edit',
            'teacher-delete',
            'regulation-list',
            'regulation-create',
            'regulation-edit',
            'regulation-delete',
            'class-transfer',
            'poins-list',
            'poins-create',
            'poins-edit',
            'poins-delete',
            'poins-approve',
            'poins-reject',
            'reduction-list',
            'reduction-create',
            'reduction-edit',
            'reduction-delete',
            'import-student',
            'import-regulation',
        ];

        // Membuat permission dengan guard_name yang tepat
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admin']);
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'student']);
        }

        // Membuat role dengan guard_name yang sesuai
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $leaderRole = Role::firstOrCreate(['name' => 'leader', 'guard_name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher', 'guard_name' => 'admin']);
        $walasRole = Role::firstOrCreate(['name' => 'walas', 'guard_name' => 'admin']);
        $studentRole = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'student']);

        // Menetapkan semua permissions ke admin
        $adminPermissions = Permission::where('guard_name', 'web')->pluck('name');
        $adminRole->syncPermissions($adminPermissions);

        $leaderPermissions = [
            'dashboard-view',
            'dashboard-admin-view',
            'dashboard-teacher-view',
            'dashboard-student-view',
            'account-management',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'teacher-list',
            'teacher-create',
            'teacher-edit',
            'teacher-delete',
            'regulation-list',
            'regulation-create',
            'regulation-edit',
            'regulation-delete',
            'class-transfer',
            'poins-list',
            'poins-create',
            'poins-edit',
            'poins-delete',
            'poins-approve',
            'poins-reject',
            'reduction-list',
            'reduction-create',
            'reduction-edit',
            'reduction-delete',
            'import-student',
            'import-regulation',
        ];
        $leaderRole->syncPermissions(Permission::where('guard_name', 'admin')->whereIn('name', $leaderPermissions)->pluck('name'));

        // Menetapkan permissions spesifik ke teacher / tim disiplin
        $teacherPermissions = [
            'regulation-list',
            'regulation-create',
            'regulation-edit',
            'regulation-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'teacher-list',
            'class-transfer',
            'poins-list',
            'poins-create',
            'import-student',
            'import-regulation',
        ];
        $teacherRole->syncPermissions(Permission::where('guard_name', 'admin')->whereIn('name', $teacherPermissions)->pluck('name'));

        // Menetapkan permissions spesifik ke walas / guru
        $walasPermissions = [
            'regulation-list',
            'student-list',
            'teacher-list',
            'poins-list',
        ];
        $walasRole->syncPermissions(Permission::where('guard_name', 'admin')->whereIn('name', $walasPermissions)->pluck('name'));

        // Menetapkan permissions spesifik ke student
        $studentRole->syncPermissions(Permission::where('guard_name', 'student')->whereIn('name', ['dashboard-view', 'regulation-list'])->pluck('name'));
    }
}
