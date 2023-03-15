<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EstadoVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estado_ventas')->insert([
            'name' => 'Pagado'
        ]);
        DB::table('estado_ventas')->insert([
            'name' => 'Pendiente'
        ]);
        DB::table('estado_ventas')->insert([
            'name' => 'Cancelado'
        ]);
    }
}
