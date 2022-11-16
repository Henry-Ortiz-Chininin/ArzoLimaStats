<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTest_Creation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // -- usuario de prueba para fines requeridos
        User::create([
            'name' => 'Henry Ortiz',
            'email' => 'chinininone@gmail.com',
            'password' => bcrypt('stats'),
        ]);
    }
}
