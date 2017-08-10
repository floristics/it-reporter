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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('qwerty'),
        'remember_token' => str_random(10),
 //       'role_id' => rand(1,3),
    ];
});

$factory->define(App\Organisation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'inn' => $faker->unique()->creditCardNumber,
        'departure_name' => $faker->company.'Departure',
        'user_id' => $faker->randomDigitNotNull,
        'num_workplace' => $faker->randomDigitNotNull.$faker->randomDigit,
        'system_id' => rand(1,2),

    ];
});

$factory->define(App\Catalog::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word.'Catalog',
    ];
});

$factory->define(App\CatalogItem::class, function (Faker\Generator $faker) {
    return [
        'catalog_id' => $faker->randomDigitNotNull,
        'name' => 'soft_'.$faker->word,
        'description' => $faker->realText(100),
    ];
});

$factory->define(App\Workplace::class, function (Faker\Generator $faker) {
    return [
        'departure_id' => $faker->randomDigitNotNull,
        'pc_name' => 'sds-clnt'.$faker->randomDigitNotNull.$faker->randomDigit.$faker->randomDigit,
    ];
});

$factory->define(App\Workplace_soft::class, function (Faker\Generator $faker) {
    return [
        'workplace_id' => $faker->randomDigitNotNull,
        'catalog_items_id' => $faker->randomDigitNotNull,
        'count' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Budget::class, function (Faker\Generator $faker) {
    return [
        'organisation_id' => $faker->randomDigitNotNull,
        'catalog_item_id' => $faker->randomDigitNotNull,
        'value' => rand(100, 10000)*5.35,
    ];
});

$factory->define(App\License::class, function (Faker\Generator $faker) {
    return [
        'organisation_id' => $faker->randomDigitNotNull,
        'catalog_item_id' => $faker->randomDigitNotNull,
        'quantity' => rand(1, 30),
    ];
});

$factory->define(App\Contract::class, function (Faker\Generator $faker) {
    return [
        'organisation_id' => $faker->randomDigitNotNull,
        'pay_method' => $faker->randomDigitNotNull,
        'contractor' => $faker->randomDigitNotNull,
        'name' => 'Договор №'.rand(5,435),
        'value' => rand(100, 10000)*5.35,
        'create_date' => $faker->randomDigitNotNull,
        'specialist' => $faker->name,
        'create_date' => $faker->dateTime,
        'comment' => $faker->text(35),
        'pay_period' => rand(1, 2),
    ];
});

/*
$factory->define(App\Departure::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company.'Departure',
        'description' => $faker->realText(60),
        'organisation_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'num_workplace' => $faker->randomDigitNotNull.$faker->randomDigit,
    ];
});

$factory->define(App\Organisation::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'inn' => $faker->randomDigit,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});*/