<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'      => 'landson randel',
            'email'     => 'landson@gmail.com',
            'password'  =>  bcrypt('123456'),
       ]);
    }
}
