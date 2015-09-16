<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class RoleTableSeeder extends Seeder {

	public function run() {

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
			DB::table(config('access.roles_table'))->truncate();
		else //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.roles_table')." CASCADE");

		//Create admin role, id of 1
		$role_model = config('access.role');
		$admin = new $role_model;
		$admin->name = 'Administrator';
		$admin->all = true;
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();

		//id = 2
		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = 'User';
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}