<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Model::unguard();
        
        factory('Park\User','admin', 3)->create();
        factory('Park\User','member', 10)->create();
        factory('Park\Piso', 10)->create();
        factory('Park\Cliente', 10)->create();
        factory('Park\Clase', 10)->create();
        factory('Park\Tarifa', 10)->create();
        factory('Park\Vehiculo', 10)->create(); 
        factory('Park\Espacio', 10)->create();
        factory('Park\Empresa', 10)->create();
        factory('Park\Estacionamiento', 10)->create();
        factory('Park\Boleta', 10)->create();
        factory('Park\Ticket', 10)->create();

        Model::reguard();
    }
}
