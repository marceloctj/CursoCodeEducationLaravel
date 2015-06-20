<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeCommerce\User::class, function ($faker) {
    return [
        'name' 			 => $faker->name,
        'email' 		 => $faker->email,
        'password'		 => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeCommerce\Categoria::class, function ($faker) {
    return [
        'name' 		  => $faker->word,
        'description' => $faker->sentence        
    ];
});

$factory->define(CodeCommerce\Produto::class, function ($faker) {
    return [
        'name' 		  => $faker->name,
        'description' => $faker->text,
        'price'	  => $faker->randomNumber(5),
        'featured'	  => rand(0,1),
        'recommend'	  => rand(0,1),
    ];
});
