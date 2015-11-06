<?php

use Illuminate\Database\Seeder;

class TramitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\tramites::class,10)->create();
    }
}
