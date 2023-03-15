<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WholesalerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        DB::table('wholesalers')->insert([
        	'name' => 'Importadora pradel',
        	'phone' => '67531400',
            'addres' => 'Avenida petrolera',
            'nit' =>'18021996',
            'email' => 'import-pradel@gmail.com',
            'description' => 'Cinta aislante, electrodo mt12, alambdre de amarre',
            'department_id' => 3
        ]);
        DB::table('wholesalers')->insert([
        	'name' => 'Alejandra',
        	'phone' => '67001453',
            'addres' => 'Calle moxos',
            'nit' =>'18021996',
            'email' => 'alejandra-import@gmail.com',
            'description' => 'chapas travex, chapas alianca',
            'department_id' => 3
        ]);
        DB::table('wholesalers')->insert([
        	'name' => 'Ines',
        	'phone' => '70367531',
            'addres' => 'Calle santivañes',
            'nit' =>'18021996',
            'email' => 'ines452673@gmail.com',
            'description' => 'Electrodo conarco, electrodo mt12, electrodo bambozi',
            'department_id' => 4
        ]);
    }
}
