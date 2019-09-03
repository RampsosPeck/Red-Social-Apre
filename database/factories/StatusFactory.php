<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Redsocialapre\Models\Status;
use Faker\Generator as Faker;
use Redsocialapre\User;
	
$factory->define(Status::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function(){
            return factory(User::class)->create();
        }
    ];
});
