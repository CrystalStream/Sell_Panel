<?php

use Illuminate\Database\Seeder;
use APISELL\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' 		=> 'Admin',
        	'password' 	=> Hash::make('admin'),
        	'role_id'  	=> '1'
        ]);
    }
}
