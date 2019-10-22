<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Nate',
        	'email' => 'nwninja1@gmail.com',
        	'email_verified_at' => date('Y-m-d H:i:s'),
        	'password' => bcrypt('password'),
        ]);

         User::create([
            'name' => 'Jo',
            'email' => 'jotasstic@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('yaskween'),
        ]);
    }
}
