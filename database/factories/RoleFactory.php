<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Role::class, function (Faker $faker) {
    $name = $faker->unique()->randomElement($array = array('Admin', 'Global', 'Office', 'Financial', 'Operador'));
    $slug = strtolower($name);

    return [
        'name' 			=> $name,
        'slug' 			=> $slug,
        'description'  	=> $faker->text($maxNbChars = 100),
    ];
});