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
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Permisos predeterminados agregados correctamente.');

        $input_roles = 'administrator,user';

        // Explode roles
        $roles = explode(',', $input_roles);

        // Add roles
        foreach($roles as $role) {
            $role = Role::firstOrCreate(['name' => $role]);

            if( $role->name == 'administrator' ) {
                // Assign all permissions
                // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
                $role->syncPermissions(Permission::all());
                $this->command->info('Todos los permisos otorgados al usuario: administrator');
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

        if( $role->name == 'administrator' ) {
            $this->command->info('Detalles para iniciar sesión como administrador:');
            $this->command->warn("Correo: $user->email");
            $this->command->warn("Usuario: $user->username");
            $this->command->warn('Contraseña: secret');
        }else{
            $this->command->info('Detalles para iniciar sesión como usuario:');
            $this->command->warn("Correo: $user->email");
            $this->command->warn("Usuario: $user->username");
            $this->command->warn('Contraseña: secret');
        }
    }
}
