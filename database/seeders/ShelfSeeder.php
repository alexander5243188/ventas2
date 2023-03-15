<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shelves')->insert([
            'name'=> 'A'
        ]);
        DB::table('shelves')->insert([
            'name'=> 'B'
        ]);
        DB::table('shelves')->insert([
            'name'=> 'C'
        ]);
        DB::table('shelves')->insert([
            'name'=> 'D'
        ]);
        DB::table('shelves')->insert([
            'name'=> 'E'
        ]);
        DB::table('shelves')->insert([
            'name'=> 'F'
        ]);        
    }
}
