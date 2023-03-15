<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //App\Models\User::factory(10)->create();
        //$this->call(ClientSeeder::class);        
        //$this->call(EstadoVentaSeeder::class);
        
        //$this->call(VaucherSeeder::class);
        $this->call(LevelSeeder::class); //------------------------------->
        $this->call(ShelfSeeder::class); //------------------------------->
        $this->call(StatusSeeder::class); //------------------------------->
        $this->call(UserSeeder::class); //------------------------------->
        $this->call(TypeSeeder::class); //------------------------------->
        $this->call(AlertSeeder::class); //------------------------------->
        $this->call(CountrySeeder::class); //------------------------------->
        $this->call(BrandSeeder::class); //------------------------------->
        $this->call(IvaSeeder::class); //------------------------------->
        
        $this->call(DepartmentSeeder::class); //------------------------------->
        $this->call(DenominationSeeder::class); //------------------------------->

        //$this->call(WholesalerSeeder::class);

        $this->call(ProveedorSeeder::class); //------------------------------->

        $this->call(CategorySeeder::class); //------------------------------->
       //php  $this->call(ProductSeeder::class);
        
        $this->call(RolesTableSeeder::class); //------------------------------->
    }
}


        
        
        