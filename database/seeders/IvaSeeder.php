<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Iva::create([ 	'tax' => '13'        	    ]);
        DB::table('ivas')->insert([
            'tax'=> 13
        ]);
    }
}
