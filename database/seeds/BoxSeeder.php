<?php

use Illuminate\Database\Seeder;
use APISELL\Box;


class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Box::create([
        	'name'=>'Caja chica',
        	'current_money'=>'320'        
        ]);
        Box::create([
        	'name'=>'Caja grande',
        	'current_money'=>'1000'
        ]);
    }
}
