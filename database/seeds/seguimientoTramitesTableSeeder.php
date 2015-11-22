<?php

use Illuminate\Database\Seeder;

class seguimientoTramitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\seguimientoTramite::class,10)->create();
    }
}
