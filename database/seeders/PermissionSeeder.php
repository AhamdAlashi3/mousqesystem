<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Role::create(['name' => 'User', 'guard_name' => 'user']);

        Permission::create(['name'=>'Create-Cities','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Cities','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Cities','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Cities','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Admins','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Admins','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Admins','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Admins','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Users','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Users','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Users','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Users','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Teachers','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Teachers','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Teachers','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Teachers','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Surahs','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Surahs','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Surahs','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Surahs','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Supervisors','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Supervisors','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Supervisors','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Supervisors','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Student_notes','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Student_notes','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Student_notes','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Student_notes','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Students','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Students','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Students','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Students','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Leaders','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Leaders','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Leaders','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Leaders','guard_name'=>'admin']);

        Permission::create(['name'=>'Create-Classess','guard_name'=>'admin']);
        Permission::create(['name'=>'Read-Classess','guard_name'=>'admin']);
        Permission::create(['name'=>'Update-Classess','guard_name'=>'admin']);
        Permission::create(['name'=>'Delete-Classess','guard_name'=>'admin']);

        Permission::create(['name' => 'Create-Roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Roles', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Permissions', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Permissions', 'guard_name' => 'admin']);
    }
}
