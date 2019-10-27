<?php

use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Models\Auth\Permission;
use Illuminate\Database\Seeder;

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

        $this->command->info('--------------------------------------------------------');
        $this->command->info('');
        $this->command->info(__('PERMISOS PREDETERMINADOS AGREGADOS CORRECTAMENTE.'));
        $this->command->info('');
        $this->command->info('--------------------------------------------------------');

        // Create Roles
        Role::create(['name' => config('access.users.super_admin_role')]);
        Role::create(['name' => config('access.users.admin_role')]);
        Role::create(['name' => config('access.users.default_role')]);

        $roles = Role::all();

        // Add roles
        foreach ($roles as $role) {
            if ($role->name == config('access.users.super_admin_role') || config('access.users.admin_role')) {
                // Assign all permissions
                // Note: Super Admin (User 1) and Admin Has all permissions via a gate in the AuthServiceProvider
                $role->syncPermissions(Permission::all());
                $this->command->info('--------------------------------------------------------');
                $this->command->info(__('TODOS LOS PERMISOS OTORGADOS A LOS ROLES'.' '.mb_strtoupper(config('access.users.super_admin_role')).'-'.mb_strtoupper(config('access.users.admin_role'))));
                $this->command->info('--------------------------------------------------------');
            } else {
                // For others by default only read access
                $role->syncPermissions(Permission::where('name', 'LIKE', '%.read')->get());
            }

            // Create one user for each role
            $this->createUser($role);
        }

        $this->enableForeignKeys();
    }

    /**
     * Create a user with given role.
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);

        if ($role->name == config('access.users.super_admin_role')) {
            $this->command->info('--------------------------------------------------------');
            $this->command->info(__('DETALLES PARA INICIAR SESION COMO SUPER ADMINISTRADOR:'));
            $this->command->info('--------------------------------------------------------');
            $this->command->info('');
            $this->command->warn(__("Correo: $user->email"));
            $this->command->warn(__("Usuario: $user->username"));
            $this->command->warn(__('Contraseña: secret'));
            $this->command->info('');
        } elseif ($role->name == config('access.users.admin_role')) {
            $this->command->info('--------------------------------------------------------');
            $this->command->info(__('DETALLES PARA INICIAR SESION COMO ADMINISTRADOR:'));
            $this->command->info('--------------------------------------------------------');
            $this->command->info('');
            $this->command->warn(__("Correo: $user->email"));
            $this->command->warn(__("Usuario: $user->username"));
            $this->command->warn(__('Contraseña: secret'));
            $this->command->info('');
        } else {
            $this->command->info('--------------------------------------------------------');
            $this->command->info(__('DETALLES PARA INICIAR SESION COMO USUARIO:'));
            $this->command->info('--------------------------------------------------------');
            $this->command->info('');
            $this->command->warn(__("Correo: $user->email"));
            $this->command->warn(__("Usuario: $user->username"));
            $this->command->warn(__('Contraseña: secret'));
            $this->command->info('');
        }
    }
}
