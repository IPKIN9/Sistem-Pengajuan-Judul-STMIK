<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserPermissionSeeder extends Seeder
{

    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'user-get']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-update']);

        Permission::create(['name' => 'dosen-get']);
        Permission::create(['name' => 'dosen-create']);
        Permission::create(['name' => 'dosen-update']);

        Permission::create(['name' => 'suadmin-get']);
        Permission::create(['name' => 'suadmin-create']);
        Permission::create(['name' => 'suadmin-update']);
        Permission::create(['name' => 'suadmin-delete']);

        $roleSuAdmin = Role::create(['name' => 'suadmin']);
        $roleSuAdmin->givePermissionTo([
            'suadmin-get',
            'suadmin-create',
            'suadmin-update',
            'suadmin-delete',
        ]);

        $roleUser = Role::create(['name' => 'dosen']);
        $roleUser->givePermissionTo(['dosen-get', 'dosen-create', 'dosen-update']);

        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo(['user-get', 'user-create', 'user-update']);

        $superAdmin = User::create(
            [
                'id_profile' => null,
                'username' => 'super admin',
                'password' => Hash::make('NYz=%t*x7ac5#_Z4'),
            ]
        );
        $superAdmin->assignRole($roleSuAdmin);

        $user = User::create(
            [
                'id_profile' => null,
                'username' => 'user',
                'password' => Hash::make('myuser123'),
            ]
        );
        $user->assignRole($roleUser);
    }
}
