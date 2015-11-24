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
use App\tramites;
use App\User;
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'ci' => $faker->buildingNumber,
        'role' => $faker->randomElement(['user','editor','admin']),
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
        'descripcion' => $faker->text,
        'id_entpub'=>factory(App\EntidadPublica::class)->create()->id,
    ];
});

$factory->define(App\solicitudes::class, function ($faker){
    return [
     'id_user'=>factory(App\User::class)->create()->id,
      'id_tramite'=>factory(App\tramites::class)->create()->id,
        'fecha_soli'=>$faker->date($format='Y-m-d',$max='now')
    ];
});
$factory->define(App\Requisito::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text
    ];
});
$factory->define(App\TieneRequisito::class, function(Faker\Generator $faker){
    $t=tramites::lists('id')->all();
    return [
        'id_tramite'=>$faker->randomElement($t),
        // 'id_tramite'=>factory(App\tramites::class)->create()->id,
        'id_requisito'=>factory(App\Requisito::class)->create()->id,
    ];
});
$factory->define(App\EntidadPublica::class,function(Faker\Generator $faker){
    return[
        'nombre_razonSocial'=>$faker->name,
        'direccion'=>$faker->address,
        'fono'=>$faker->phoneNumber,
        'latitude'=>$faker->latitude,
        'longitude'=>$faker->longitude
    ];
});
$factory->define(App\seguimientoTramite::class, function(Faker\Generator $faker){
    $t=User::lists('id')->all();
    $p=tramites::lists('id')->all();
    return [
        'id_user'=>$faker->randomElement($t),
        // 'id_tramite'=>factory(App\tramites::class)->create()->id,
        'id_tramites'=>$faker->randomElement($p)
    ];
});

$factory->define(App\NroCuenta::class, function(Faker\Generator $faker){
    $e=\App\EntidadPublica::lists('id')->all();
    return [
        'nro'=>$faker->creditCardNumber,
        'entidad_bancaria'=>$faker->name,
        'id_entpub'=>$faker->randomElement($e),

    ];
});
$factory->define(App\procedimiento::class, function(Faker\Generator $faker){
    $t=tramites::lists('id')->all();
    return [
        'pasos'=>$faker->text,
        'referencias'=>$faker->url,
        'id_tramite'=>$faker->randomElement($t),
    ];
});$factory->define(App\pasos::class, function(Faker\Generator $faker){
    $p=\App\procedimiento::lists('id')->all();
    return [
        'paso'=>$faker->text(20),
        'id_proc'=>$faker->randomElement($p),
    ];
});