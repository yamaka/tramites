<?php

use Illuminate\Database\Seeder;

class ProcedimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\procedimiento::class,10)->create();
    }
}
