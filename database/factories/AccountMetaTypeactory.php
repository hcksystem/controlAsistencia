<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\AccountMetaType;
use App\AccountCategory;
use App\Country;
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


$factory->define(AccountMetaType::class, function (Faker $faker) {
    return [
        'metatype'		  	    => $faker->company,
        'required' 	  	        => $faker->randomElement($array = [ 0 , 1 ]),
        'description'			=>  $faker->text($maxNbChars = 60),
        'active' 	  	        => $faker->randomElement($array = [ 0 , 1 ]),
    ];
});
