<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\ProfitCenter;
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


$factory->define(User::class, function (Faker $faker) {
    return [
        'fullname' 			=> $faker->name,
        'email' 			=> $faker->email,
        'password' 			=> bcrypt('secret'), // password
		'status'         	=> $faker->randomElement($array = array ('active','inactive','suspended')),
		'phone1'			=> $faker->tollFreePhoneNumber,
		'phone2'			=> $faker->tollFreePhoneNumber,
		'cell1'				=> $faker->phoneNumber,
		'cell2'				=> $faker->phoneNumber,
        'profit_center_id' 	=> ProfitCenter::all()->random()->id,
        'email_verified_at' => now(),
    ];
});
