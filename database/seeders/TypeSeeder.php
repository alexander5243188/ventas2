<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'name' => 'BILLETE'
        ]);
        DB::table('types')->insert([
            'name' => 'MONEDA'
        ]);
        DB::table('types')->insert([
            'name' => 'OTRO'
        ]);
    }
}
