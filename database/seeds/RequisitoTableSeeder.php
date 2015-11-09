<?php

use Illuminate\Database\Seeder;

class RequisitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Requisito::class,10)->create();
    }
}
