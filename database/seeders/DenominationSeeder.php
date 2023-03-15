<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Denomination;

class DenominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denomination::create([
        	//'type' => 'BILLETE',
            'type_id' => 1,
        	'value' => 200,
            'image'=>'6396a32b5a47e_.jpg'
        ]);
         Denomination::create([
        	//'type' => 'BILLETE',
            'type_id' => 1,
        	'value' => 100,
            'image'=>'6396a3b1624d6_.jpg'
        ]);
          Denomination::create([
        	//'type' => 'BILLETE',
            'type_id' => 1,
        	'value' => 50,
            'image'=>'6396a3be21ba2_.jpg'
        ]);
           Denomination::create([
        	//'type' => 'BILLETE',
            'type_id' => 1,
        	'value' => 20,
            'image'=>'6396a3c87828c_.jpg'
        ]);
            Denomination::create([
        	//'type' => 'BILLETE',
            'type_id' => 1,
        	'value' => 10,
            'image'=>'6396a3d28eebc_.jpg'
        ]);             
              Denomination::create([
        	//'type' => 'MONEDA',
              'type_id' => 2,
        	'value' => 5,
            'image'=>'6396a3e57b719_.jpg'
        ]);
              Denomination::create([
        	//'type' => 'MONEDA',
              'type_id' => 2,
        	'value' => 2,
            'image'=>'6396a3f188a72_.jpg'
        ]);
              Denomination::create([
        	//'type' => 'MONEDA',
            'type_id' => 2,
        	'value' => 1,
            'image'=>'6396a40140700_.jpg'
        ]);
            Denomination::create([
        	//'type' => 'MONEDA',
              'type_id' => 2,
        	'value' => 0.5,
            'image'=>'6396a40e26ba0_.jpg'
        ]);
            Denomination::create([
                  //'type' => 'MONEDA',
                  'type_id' => 2,
                  'value' => 0.2,
                  'image'=>'6396a41a01a1e_.jpg'
            ]);
            Denomination::create([
                  //'type' => 'MONEDA',
                  'type_id' => 2,
                  'value' => 0.1,
                  'image'=>'6396a427d1f03_.jpg'
            ]);
              Denomination::create([
        	      //'type' => 'OTRO',
                    'type_id' => 3,
        	      'value' => 0
                  
        ]);
    }
}

