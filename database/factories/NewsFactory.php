<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    // $faker = \Faker\Factory::create('ru_RU'); Эту команду перенесли в синглтон app/Providers/AppServiceProvider.php в метод boot.

    return [
        'title' => $faker->realText(rand(10, 30)),
        'text' => $faker->realText(rand(1000, 3000)),
        'isPrivate' => false
    ];
});
