<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantsProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('provincias')->truncate();

        $provincias = [
            [
                'pais_id' => '186',
                'descripcion' => 'DISTRITO NACIONAL',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'AZUA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'BAHORUCO',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'BARAHONA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'DAJABÓN',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'DUARTE',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'ELÍAS PIÑA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'EL SEIBO',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'ESPAILLAT',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'INDEPENDENCIA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'LA ALTAGRACIA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'LA ROMANA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'LA VEGA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'MARÍA TRINIDAD SÁNCHEZ',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'MONTE CRISTI',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'PEDERNALES',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'PERAVIA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'PUERTO PLATA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'HERMANAS MIRABAL',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SAMANÁ',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SAN CRISTOBAL',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SAN JUAN',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SAN PEDRO DE MACORÍS',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SÁNCHEZ RAMÍREZ',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SANTIAGO',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SANTIAGO RODRÍGUEZ',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'VALVERDE',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'MONSEÑOR NOUEL',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'MONTE PLATA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'HATO MAYOR',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SAN JOSÉ DE OCOA',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
            [
                'pais_id' => '186',
                'descripcion' => 'SANTO DOMINGO',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addWeeks(2),
            ],
        ];

        DB::table('provincias')->insert($provincias);
    }
}
