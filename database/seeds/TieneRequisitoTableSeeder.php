<?php

use Illuminate\Database\Seeder;

class TieneRequisitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TieneRequisito::class,10)->create();
    }
}
