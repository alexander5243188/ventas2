<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VaucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vauchers')->insert([
            'name' => 'Recibo'
        ]);
        DB::table('vauchers')->insert([
            'name' => 'Proforma'
        ]);
        DB::table('vauchers')->insert([
            'name' => 'Factura'
        ]);
    }
}
