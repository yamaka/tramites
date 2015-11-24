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

        $this->call(UsersTableSeeder::class);
        //$this->call(TramitesTableSeeder::class);
        $this->call(SolicitudesTableSeeder::class);
        $this->call(TieneRequisitoTableSeeder::class);
        $this->call(seguimientoTramitesTableSeeder::class);
        $this->call(NroCuentaTableSeeder::class);
        $this->call(ProcedimientoTableSeeder::class);
        $this->call(PasosTableSeeder::class);
        Model::reguard();
    }
}
