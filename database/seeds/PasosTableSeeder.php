<?php

use Illuminate\Database\Seeder;

class PasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\pasos::class,10)->create();
    }
}
