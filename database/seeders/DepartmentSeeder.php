<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            'name'=> 'Beni'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Chuquisaca'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Cochabamba'
        ]);
        DB::table('departments')->insert([
            'name'=> 'La Paz'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Oruro'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Pando'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Potosí'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Santa Cruz'
        ]);
        DB::table('departments')->insert([
            'name'=> 'Tarija'
        ]);
    }
}
