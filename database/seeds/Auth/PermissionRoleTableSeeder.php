<?php

use Illuminate\Database\Seeder;
use App\Models\System\Auth\Role;
use App\Models\System\Auth\User;
use App\Models\System\Auth\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Istrator',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'Usuario',
            'last_name' => 'Predeterminado',
            'username' => 'defaultuser',
            'email' => 'user@user.com',
            'password' => 'secret',
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        // Create Roles
        Role::create([
            'name' => config('access.users.super_admin_role'),
            'description' => 'Perfil de Acceso completo a todos los módulos del sistema.'
        ]);
        Role::create([
            'name' => config('access.users.admin_role'),
            'description' => 'Perfil de Administración de los módulos del sistema.'
        ]);
        Role::create([
            'name' => config('access.users.default_role'),
            'description' => 'Perfil predeterminado de un Usuario.'
        ]);

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            foreach ($perms['name'] as $key => $name) {
                Permission::firstOrCreate([
                    'module_id' => $perms['module_id'],
                    'name' => $name,
                    'display_name' => $perms['display_name'][$key],
                ]);
            }
        }

        User::find(1)->assignRole(config('access.users.super_admin_role'));
        User::find(2)->assignRole(config('access.users.admin_role'));
        User::find(3)->assignRole(config('access.users.default_role'));

        $this->enableForeignKeys();
    }
}
