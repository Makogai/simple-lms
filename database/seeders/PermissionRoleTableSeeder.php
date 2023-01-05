<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $prof_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        $user_permissions = [
            21,19,24, 26, 29,31,34, 36,44, 46, 54, 56
        ];
        Role::findOrFail(2)->permissions()->sync($prof_permissions);
        Role::findOrFail(3)->permissions()->sync($user_permissions);
    }
}
