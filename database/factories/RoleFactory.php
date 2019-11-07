<?php

use Faker\Generator as Faker;
use App\Models\System\Auth\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
