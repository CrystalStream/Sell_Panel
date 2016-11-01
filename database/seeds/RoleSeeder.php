<?php

use Illuminate\Database\Seeder;
use APISELL\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
        	'role'=>'Administrador'
        ]);
        Roles::create([
        	'role'=>'Trabajador'
        ]);
    }
}
