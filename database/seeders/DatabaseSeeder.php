<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->createAdminUser();
    }

    public function createAdminUser(){

        User::create([
            'firstName' => 'Bruno',
            'lastName' => 'Pereira',
            'email' => 'brunopy2@gmail.com',
            'password' => Hash::make('123') ,
            'permission' => 1
        ]);

    }
}
