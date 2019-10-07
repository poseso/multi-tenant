<?php

use App\Models\Auth\User;
use App\Models\Auth\Role;
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
            Permission::firstOrCreate([
                'name' => $perms,
                'module_id' => '1'
            ]);
        }

        $this->command->info('Permisos predeterminados agregados correctamente.');

        // Create Roles
        Role::create(['name' => config('access.users.admin_role')]);
        Role::create(['name' => config('access.users.default_role')]);

        $roles = Role::all();

        // Add roles
        foreach($roles as $role) {
            if( $role->name == config('access.users.admin_role') ) {
                // Assign all permissions
                // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
                $role->syncPermissions(Permission::all());
                $this->command->info(__("Todos los permisos otorgados al usuario:" . config('access.users.admin_role')));
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
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);

        if( $role->name == config('access.users.admin_role') ) {
            $this->command->info(__('Detalles para iniciar sesión como administrador:'));
            $this->command->warn(__("Correo: $user->email"));
            $this->command->warn(__("Usuario: $user->username"));
            $this->command->warn(__('Contraseña: secret'));
        }else{
            $this->command->info(__('Detalles para iniciar sesión como usuario:'));
            $this->command->warn(__("Correo: $user->email"));
            $this->command->warn(__("Usuario: $user->username"));
            $this->command->warn(__('Contraseña: secret'));
        }
    }
}
