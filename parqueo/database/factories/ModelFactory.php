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
$factory->defineAs(Park\User::class, 'admin', function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123'),
        'type' => 'admin',
        'remember_token' => str_random(10),
    ];
});
$factory->defineAs(Park\User::class, 'member', function ($faker) {
    return [
        'name' => $faker->name,
       'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123'),
        'type' => 'member',
        'remember_token' => str_random(10),
    ];
});

$factory->define(Park\Piso::class, function ($faker) {
    return [
        'numero' => $faker->randomDigit,
        'categoria' => $faker->creditCardType,
    ];
});

$factory->define(Park\Tarifa::class, function ($faker) {
    return [
        'val_hora' =>5.00,
        'val_dia' => 15.00,
        'val_mes' => 350.00,
        'clase_id' => Park\Clase::all()->random()->id,
    ];
});

$factory->define(Park\Clase::class, function ($faker) {
    return [
        'descripcion' =>'Auto',
       
    ];
});

$factory->define(Park\Cliente::class, function ($faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->firstNameMale,
        'telefono' => 68930478,
       
    ];
});
$factory->define(Park\Empresa::class, function ($faker) {
    return [
        'nit' => 194369020,
        'nombre' => $faker->company,
        'ciudad' => $faker->catchPhrase,
        'direccion' => $faker->catchPhrase,
        'telefono' => 68930478,
        'nrocohera' => 25,
    ];
});

$factory->define(Park\Vehiculo::class, function ($faker) {
    return [
        'placa' => $faker->creditCardNumber,
        'marca' => $faker->company,
        'color' => $faker->catchPhrase,
        'cliente_id' => Park\Cliente::all()->random()->id,
        'clase_id' => Park\Clase::all()->random()->id,
    ];
});
$factory->define(Park\Espacio::class, function ($faker) {
    return [
        'numero' => $faker->randomDigit,
        'medida' => '2x1',
        'estado' => $faker->domainWord,
        'piso_id' => Park\Piso::all()->random()->id,
        
    ];
});


$factory->define(Park\Estacionamiento::class, function ($faker) {
    return [
        'fechaingreso'=> '1979-06-09',
        'horaigreso'=> '20:49:42',
        'espacio_id' => Park\Espacio::all()->random()->id,
        'vehiculo_id' => Park\Vehiculo::all()->random()->id,
        
    ];
});
$factory->define(Park\Boleta::class, function ($faker) {
    return [
        'ingreso' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'salida' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'total_horas' => $faker->randomDigit,
        'total_dias' => $faker->month($max = 'now'),
        'valor' => $faker->randomDigit,
        'total_pagar' => 00.00,
        'estacionamiento_id' => Park\Estacionamiento::all()->random()->id,
        'empresa_id' => Park\Empresa::all()->random()->id,
        'tarifa_id' => Park\Tarifa::all()->random()->id,
    ];
});

$factory->define(Park\Ticket::class, function ($faker) {
    return [
        'nrocochera'=> $faker->randomDigit,
        'nropiso'=> $faker->randomDigit,
        'ingreso' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'estacionamiento_id' => Park\Estacionamiento::all()->random()->id,
        'empresa_id' => Park\Empresa::all()->random()->id,
    ];
});
