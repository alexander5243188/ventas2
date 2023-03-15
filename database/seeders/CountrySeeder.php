<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([
            'name'=> 'Bolivia',
            'image' => '63969dec0c9f4_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Brazil',
            'image' => '63969dfa1af71_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Chile',
            'image' => '63969e1493427_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'China',
            'image' => '63969af30cd7f_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Mexico',
            'image' => '63969e392455d_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Estados Unidos',
            'image' => '63969e46dd098_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Canada',
            'image' => '63969e064cfe0_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Colombia',
            'image' => '63969e5260893_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Alemania',
            'image' => '63969dce584d5_.jpg'
        ]);
        DB::table('countries')->insert([
            'name'=> 'Taiwan',
            'image' => '63969e242b67c_.png'
        ]);        

        //******************************* */
               
    }
}
