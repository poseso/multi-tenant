<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TenantsDatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'failed_jobs',
            'ledgers',
            'jobs',
            'sessions',
        ]);

        $this->call([
            TenantsAuthTableSeeder::class,
            TenantsSettingsTableSeeder::class,
            TenantsPaisesTableSeeder::class,
            TenantsProvinciasTableSeeder::class,
            TenantsMunicipiosTableSeeder::class,
        ]);

        Model::reguard();
    }
}
