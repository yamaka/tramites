<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'ci'=>'123456',
            'address'=>'admin',
            'occupation'=>'Admin',
            'birthday'=>'1990-10-10',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'user'=>'Admin',
            'password'=>'admin123456'
        ]);
        //factory(App\User::class,10)->create();

    }
}


