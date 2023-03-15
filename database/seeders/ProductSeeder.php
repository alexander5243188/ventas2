<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
            'name' => 'Candado # 25',
            'barcode' => '63727494',
            'cost' => '12',
            'price' => '18',
            'stock' => '19',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 1,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f7139a1d40_.jpg',
            'shelf_id' => 1,
            'level_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Candado # 30',
            'barcode' => '632784494',
            'cost' => '17',
            'price' => '23',
            'stock' => '15',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 2,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f7149c3487_.jpg',
            'shelf_id' => 2,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Candado # 60',
            'barcode' => '63264768494',
            'cost' => '42',
            'price' => '68',
            'stock' => '15',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 3,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'63771323c3c5d_.jpg',
            'shelf_id' => 3,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Chapa de tres golpes 370',
            'barcode' => '63727739844',
            'cost' => '91',
            'price' => '105',
            'stock' => '34',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 3,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f71633470d_.png',
            'shelf_id' => 4,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Brocha cerdas plasticas 2,5 "',
            'barcode' => '63726664',
            'cost' => '7',
            'price' => '12',
            'stock' => '56',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 2,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f71260a1ce_.png',
            'shelf_id' => 5,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Pintura monopol de 1 litro"',
            'barcode' => '63726',
            'cost' => '90',
            'price' => '97',
            'stock' => '20',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 2,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f71260a1ce_.png',
            'shelf_id' => 5,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Broca de fierro de 1 pulgada"',
            'barcode' => '637264',
            'cost' => '77',
            'price' => '120',
            'stock' => '36',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 2,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f71260a1ce_.png',
            'shelf_id' => 5,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Broca de madera de 1/2 pulgada"',
            'barcode' => '63764',
            'cost' => '10',
            'price' => '20',
            'stock' => '46',
            'alert_id' => 1,
            'brand_id' => 1,
            'countrie_id' => 1,
            'category_id' => 1,
            'wholesaler_id' => 2,
            'proveedor_id' => 1,
            //'iva_id' => 1,
            'image' =>'631f71260a1ce_.png',
            'shelf_id' => 5,
            'level_id' => 2,
            'user_id' => 1,
        ]);
        
    }
}
