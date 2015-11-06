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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'ci' => $faker->buildingNumber,
        'role' => $faker->randomElement(['user','editor']),
        'address' =>$faker-> address,
        'occupation' => $faker ->randomElement(['abagado','profesor','musico']),
        'birthday' => $faker ->date(),
        'user' => $faker -> userName,
        'password' =>str_random(10),
        'remember_token' => str_random(10)
    ];
});
$factory->define(App\tramites::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->randomElement(['cedulaIdentidad','liciencia','pasaporte']),
        'descripcion' => $faker->text
    ];
});

$factory->define(App\solicitudes::class, function ($faker){
    return [
     'id_user'=>factory(App\User::class)->create()->id,
      'id_tramite'=>factory(App\tramites::class)->create()->id,
        'fecha_soli'=>$faker->date($format='Y-m-d',$max='now')
    ];
});
