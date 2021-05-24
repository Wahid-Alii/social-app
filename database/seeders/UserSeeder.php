<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'name'=>'Wahid Ali',
            'email'=>'wahid@gmail.com',
            'password'=>bcrypt('password'),
        ]);
    }
}
