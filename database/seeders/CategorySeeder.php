<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              
        Category::create([
        	'name' => 'Brochas rodillos bandejas',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639630ae9540f_.png'
        ]);
        Category::create([
        	'name' => 'Cerraduras',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639630bf34023_.png'
        ]);
        
        Category::create([
        	'name' => 'Herramientas',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639630cd15b1c_.png'
        ]);        
        Category::create([
        	'name' => 'Lijas pliegos y discos esmeril',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639630dadaade_.png'
        ]);
        Category::create([
        	'name' => 'Materiales de construcción',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '63963139309db_.jpg'
        ]);
        Category::create([
        	'name' => 'Materiales electricos',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639630fa64fd3_.jpg'
        ]);
        Category::create([
        	'name' => 'Pinturas, pegamentos y accesorios',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '639631089fe78_.jpg'
        ]);
        Category::create([
        	'name' => 'Plomería',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '63963117c559c_.jpg'
        ]);
        Category::create([
        	'name' => 'Seguridad industrial',
            'user_id' => 1,
            //'country_id' => 1,
        	'image' => '63963139309db_.jpg'
        ]);

    }
}
