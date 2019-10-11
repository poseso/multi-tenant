<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $settings = [
            [
                'scope' => 'default',
                'name' => 'app_name',
                'value' => '"Contasoft"',
            ],
            [
                'scope' => 'default',
                'name' => 'timezone',
                'value' => '"America/Santo_Domingo"',
            ],
            [
                'scope' => 'default',
                'name' => 'language',
                'value' => '"es"',
            ],
            [
                'scope' => 'default',
                'name' => 'dateformat',
                'value' => '"d-m-Y"',
            ],
            [
                'scope' => 'default',
                'name' => 'timeformat',
                'value' => '"g:i A"',
            ],
        ];

        DB::table('settings')->insertOrIgnore($settings);
    }
}
