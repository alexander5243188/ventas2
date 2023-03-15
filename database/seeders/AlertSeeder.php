<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('alerts')->insert([
            'name' => 13
        ]);
    }
}
