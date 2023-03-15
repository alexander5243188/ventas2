<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('levels')->insert([
            'name'=> '1'
        ]);
        DB::table('levels')->insert([
            'name'=> '2'
        ]);
        DB::table('levels')->insert([
            'name'=> '3'
        ]);
        DB::table('levels')->insert([
            'name'=> '4'
        ]);        
    }
}
