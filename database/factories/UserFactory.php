<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    static $password;

    return [
        'name' => $faker->name,
        'tel' => '156'.mt_rand(1000, 9999).mt_rand(1000, 9999),
        'corporate' => '温州浩瑞网络科技有限公司',
        'is_admin' => false,
        'activated' => false,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
