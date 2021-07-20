<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\AccountMeta;
use App\Account;
use App\AccountMetaType;
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

$factory->define(AccountMeta::class, function (Faker $faker) {
    return [
        'account_id' 			=> Account::all()->random()->id,
        'account_meta_type_id' 	=> AccountMetaType::all()->random()->id,
        'value'    				=> $faker->randomElement($array = array ('active','inactive','suspended')),
    ];
});
