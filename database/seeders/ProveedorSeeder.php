<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('proveedors')->insert([
        	'name' => 'Importadora pradel',
        	'phone' => '67531400',
            'addres' => 'Avenida petrolera km 4,5',
            'nit' =>'18021996',
            'email' => 'import-pradel@gmail.com',
            'description' => 'Cinta aislante, Electrodo chino mt12, Alambre de amarre',
            'department_id' => 3
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Empresa unipersonal propietaria Alejandra',
        	'phone' => '67001453',
            'addres' => 'Calle moxos N° 1647',
            'nit' =>'18021996',
            'email' => 'alejandra-import@gmail.com',
            'description' => 'Chapas Travex, Chapas Alianca',
            'department_id' => 3
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Empresa unipersonal propietaria ines',
        	'phone' => '70367531',
            'addres' => 'Zona Villa Bolívar “D”, calle Pando esq. calle 3 Nº 555',
            'nit' =>'18021996',
            'email' => 'ines452673@gmail.com',
            'description' => 'Electrodo Conarco, Electrodo chino mt12, Electrodo Bambozi',
            'department_id' => 4
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Empresa unipersonal propietario pedro',
        	'phone' => '70964521',
            'addres' => 'Mercado central',
            'nit' =>'',
            'email' => '',
            'description' => 'Candados, alicates, grifos, toma corriente, brocas, martillos, pigmento, brocas, dico de corte, disco desbaste',
            'department_id' => 2
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Monopol, representante Ulices',
        	'phone' => '4432121 - 70994521',
            'addres' => 'Calle Claudio Tolomeo Nº 258, Av. Beijing y Grover Suárez. ',
            'nit' =>'6116753564',
            'email' => 'asesoria@pinturasmonopol.com',
            'description' => 'Pinturas al aceite, pinturas latex, pinturas en espray, brochas',
            'department_id' => 2
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Trupper',
        	'phone' => '75994474',
            'addres' => 'Av. Circunvalacion N°300',
            'nit' =>'6112803564',
            'email' => 'gmail.com',
            'description' => 'Flexometros, taladros, cierras mecanicas',
            'department_id' => 2
        ]);
        DB::table('proveedors')->insert([
        	'name' => 'Norton',
        	'phone' => '4268733  4268295  7224400',
            'addres' => 'Av. Blanco Galindo Km 7 una cuadra al sur',
            'nit' =>'6176433959',
            'email' => 'ventas@industriasmaca.com',
            'description' => 'Lijas norton, discos de desbaste, discos de corte',
            'department_id' => 1
        ]);
        
        
        
        
       
        
    }
}
