<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
        	'name' => 'Travex',
            'user_id' => 1            
        ]);
        
        //DB::table('brands')->insert([
        //	'name' => 'Akita',
        //    'user_id' => 1            
        //]); 
        //DB::table('brands')->insert([
        //	'name' => 'Conarco',
        //    'user_id' => 2            
        //]);        
        //DB::table('brands')->insert([
        //	'name' => 'Alianca',
        //    'user_id' => 2            
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Globe',
        //    'user_id' => 2            
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Lion',
        //    'user_id' => 2            
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Kamasa',
        //    'user_id' => 2            
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Norton',
        //    'user_id' => 1            
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Monopol',
        //    'user_id' => 1
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Xadrez',
        //    'user_id' => 1
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Black Decker',
        //    'user_id' => 2
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Bosh',
        //    'user_id' => 2
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Makita',
        //    'user_id' => 2
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Stanley',
        //    'user_id' => 1
        //]);
        //DB::table('brands')->insert([
        //	'name' => 'Skil',
        //  'user_id' => 2
        //]);
    }
}
