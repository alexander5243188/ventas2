<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//importar los modelos 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creación de usuarios        
    
        //creación de roles
        $admin    = Role::create(['name' => 'Admin']);
        
        //$empleado = Role::create(['name' => 'Employee']);
        $empleado = Role::create(['name' => 'Vendedor']);
        $almacen = Role::create(['name' => 'Almacen']);



        //------------------------------------------------------------------DASH botones
        Permission::create(['name' => 'boton_almacen_menu']);
        Permission::create(['name' => 'categoria_pagina_menu']);
        Permission::create(['name' => 'marca_pagina_menu']);
        Permission::create(['name' => 'producto_pagina_menu']);

        Permission::create(['name' => 'boton_compras_menu']);
        Permission::create(['name' => 'proveedor_pagina_menu']);

        Permission::create(['name' => 'boton_inventario_menu']);
        Permission::create(['name' => 'inventario_pagina_menu']);

        Permission::create(['name' => 'boton_ventas_menu']);
        Permission::create(['name' => 'cliente_pagina_menu']);
        Permission::create(['name' => 'arqueo_pagina_menu']);

        Permission::create(['name' => 'boton_acceso_menu']);
        Permission::create(['name' => 'usuarios_pagina_menu']);
        Permission::create(['name' => 'permisos_pagina_menu']);

        Permission::create(['name' => 'boton_reporte_menu']);
        Permission::create(['name' => 'reporte_almacen_pagina_menu']);
        Permission::create(['name' => 'reporte_ventas_pagina_menu']);

        Permission::create(['name' => 'boton_herramienta_menu']);
       // Permission::create(['name' => 'pagina_ayuda_menu']);
        //Permission::create(['name' => 'alerta_pagina_menu']);
        //Permission::create(['name' => 'denominaciones_pagina_menu']);
        Permission::create(['name' => 'pais_pagina_menu']);

        //---------------------------------------------------------------------menu_dash_solo_administrador
        //creacion de permisos sobre el dash
        Permission::create(['name' => 'menu_dash']);
        //---------------------------------------------------------------------

        //creación de permisos vistas:        
        //---------------------------------------------------------------------client
        Permission::create(['name' => 'cliente_pagina']);
        //Permission::create(['name' => 'cliente_crear']);
        //Permission::create(['name' => 'cliente_actualizar']);
        //Permission::create(['name' => 'cliente_eliminar']);
        //Permission::create(['name' => 'cliente_editar']);
        //Permission::create(['name' => 'cliente_buscar']);

        //--------------------------------------------------------------------Alertas
        Permission::create(['name' => 'alerta_pagina']);
        Permission::create(['name' => 'alerta_crear']);
        //Permission::create(['name' => 'alerta_actualizar']);
        //Permission::create(['name' => 'alerta_eliminar']);
        Permission::create(['name' => 'alerta_editar']);
        //Permission::create(['name' => 'alerta_buscar']);

        //---------------------------------------------------------------------Asignar        
        Permission::create(['name' => 'asignar_pagina']);
        Permission::create(['name' => 'asignar_sincronizar_todos']);
        Permission::create(['name' => 'asignar_revocar_todos']);
        Permission::create(['name' => 'asignar_marcar']);       

        //----------------------------------------------------------------------Brand
        Permission::create(['name' => 'marca_pagina']);
        Permission::create(['name' => 'marca_crear']);
        //Permission::create(['name' => 'marca_actualizar']);
        Permission::create(['name' => 'marca_eliminar']);
        Permission::create(['name' => 'marca_editar']);
        Permission::create(['name' => 'marca_buscar']);

        //---------------------------------------------------------------------Cashout
        Permission::create(['name' => 'dinero_entregado_pagina']);
        Permission::create(['name' => 'dinero_entregado_imprimir']);
        Permission::create(['name' => 'dinero_entregado_detalle']);

        //--------------------------------------------------------------------Category
        Permission::create(['name' => 'categoria_pagina']);
        //Permission::create(['name' => 'categoria_importar']);
        Permission::create(['name' => 'categoria_crear']);
        //Permission::create(['name' => 'categoria_actualizar']);
        Permission::create(['name' => 'categoria_eliminar']);
        Permission::create(['name' => 'categoria_editar']);
        Permission::create(['name' => 'categoria_buscar']);

        //---------------------------------------------------------------------Country
        Permission::create(['name' => 'pais_pagina']);
        Permission::create(['name' => 'pais_crear']);
        //Permission::create(['name' => 'pais_actualizar']);
        Permission::create(['name' => 'pais_eliminar']);
        Permission::create(['name' => 'pais_editar']);
        Permission::create(['name' => 'pais_buscar']);

        //-----------------------------------------------------------------------Dash
        Permission::create(['name' => 'panel_Administrativo_pagina']);

        //---------------------------------------------------------------Denomination
        Permission::create(['name' => 'denominacion_pagina']);
        //Permission::create(['name' => 'denominacion_crear']);
        //Permission::create(['name' => 'denominacion_actualizar']);
        //Permission::create(['name' => 'denominacion_eliminar']);
        //Permission::create(['name' => 'denominacion_editar']);
        Permission::create(['name' => 'denominacion_buscar']);

        //-----------------------------------------------------------------Department
        Permission::create(['name' => 'departamento_pagina']);
        //Permission::create(['name' => 'departamento_crear']);
        //Permission::create(['name' => 'departamento_actualizar']);
        //Permission::create(['name' => 'departamento_eliminar']);
       // Permission::create(['name' => 'departamento_editar']);
        //Permission::create(['name' => 'departamento_buscar']);

        //Import

     

        //----------------------------------------------------------------------Iva
       // Permission::create(['name' => 'iva_pagina']);
        //Permission::create(['name' => 'iva_crear']);
        //Permission::create(['name' => 'iva_actualizar']);
        //Permission::create(['name' => 'iva_eliminar']);
        //Permission::create(['name' => 'iva_editar']);
        //Permission::create(['name' => 'iva_buscar']);

        //------------------------------------------------------------------Permisos
        //Permission::create(['name' => 'permiso_pagina']);
        //Permission::create(['name' => 'permiso_crear']);
        //Permission::create(['name' => 'permiso_actualizar']);
        //Permission::create(['name' => 'permiso_eliminar']);
        //Permission::create(['name' => 'permiso_editar']);
        //Permission::create(['name' => 'permiso_buscar']);

        //Pos

        //-----------------------------------------------------------------Products
        Permission::create(['name' => 'producto_pagina']); 
        //Permission::create(['name' => 'producto_importar']);
        Permission::create(['name' => 'producto_crear']);
        //Permission::create(['name' => 'producto_actualizar']);
        Permission::create(['name' => 'producto_eliminar']);
        Permission::create(['name' => 'producto_editar']);
        Permission::create(['name' => 'producto_buscar']);

        //Regents
        //Reports
        //-------------------------------------------------------------------Roles 
        Permission::create(['name' => 'roles_pagina']);
        //Permission::create(['name' => 'roles_crear']);
        //Permission::create(['name' => 'roles_actualizar']);
        //Permission::create(['name' => 'roles_eliminar']);
        //Permission::create(['name' => 'roles_editar']);
        Permission::create(['name' => 'roles_buscar']);
        
        //------------------------------------------------------------------Status
        //Permission::create(['name' => 'estado_pagina']);
        //Permission::create(['name' => 'estado_crear']);
        //Permission::create(['name' => 'estado_actualizar']);
        //Permission::create(['name' => 'estado_eliminar']);
        //Permission::create(['name' => 'estado_editar']);
        //Permission::create(['name' => 'estado_buscar']);

        //-------------------------------------------------------------------Type
        //Permission::create(['name' => 'tipo_deneminacion_pagina']);
        //Permission::create(['name' => 'tipo_denominacion_crear']);
        //Permission::create(['name' => 'tipo_denominacion_actualizar']);
        //Permission::create(['name' => 'tipo_denominacion_eliminar']);
        //Permission::create(['name' => 'tipo_deneminacion_editar']);
        //Permission::create(['name' => 'tipo_deneminacion_buscar']);

        //-------------------------------------------------------------------Users
        Permission::create(['name' => 'usuario_pagina']);
        Permission::create(['name' => 'usuario_crear']);
        //Permission::create(['name' => 'usuario_actualizar']);
        Permission::create(['name' => 'usuario_eliminar']);
        Permission::create(['name' => 'usuario_editar']);
        Permission::create(['name' => 'usuario_buscar']);

        //Utils
        //---------------------------------------------------------------proveedor
        Permission::create(['name' => 'proveedor_pagina']);
        Permission::create(['name' => 'proveedor_crear']);
        //Permission::create(['name' => 'mayorista_actualizar']);
        Permission::create(['name' => 'proveedor_eliminar']);
        Permission::create(['name' => 'proveedor_editar']);
        Permission::create(['name' => 'proveedor_buscar']);

        //creación de permisos navegación

        //----------------------------------------------------------------Almacen
        Permission::create(['name' => 'almacen_pagina']);
        Permission::create(['name' => 'boton_registrar_cantidades']);        
        //Permission::create(['name' => 'almacen_actualizar']);
        //Permission::create(['name' => 'almacen_eliminar']);
        //Permission::create(['name' => 'almacen_editar']);
        //Permission::create(['name' => 'almacen_buscar']);

        //----------------------------------------------------------------Inventario
              
    
   
        //---------------------------------------------------------------------Sales
        Permission::create(['name' => 'venta_pagina']);
        Permission::create(['name' => 'venta_crear']);
        
     

        //------------------------------------------------------------------Permisos
        Permission::create(['name' => 'permiso_pagina']);
        //Permission::create(['name' => 'permiso_crear']);
        //Permission::create(['name' => 'permiso_actualizar']);
        //Permission::create(['name' => 'permiso_eliminar']);
        //Permission::create(['name' => 'permiso_editar']);
        Permission::create(['name' => 'permiso_buscar']);

     
       
  
        //-------------------------------------------------------------------Arqueos
        Permission::create(['name' => 'arqueo_pagina']);
        //Permission::create(['name' => 'arqueo_crear']);
        //Permission::create(['name' => 'arqueo_actualizar']);
        //Permission::create(['name' => 'arqueo_eliminar']);
        //Permission::create(['name' => 'arqueo_editar']);
        //Permission::create(['name' => 'arqueo_buscar']);
        
        //--------------------------------------------------------Reportes ventas
        Permission::create(['name' => 'reporte_ventas_pagina']);
        Permission::create(['name' => 'reporte_ventas_pdf']);
        //Permission::create(['name' => 'reporte_excel']);

        //--------------------------------------------------------Reportes inventario
        Permission::create(['name' => 'reporte_almacen_pagina']);
        Permission::create(['name' => 'reporte_almacen_pdf']);


        //asignar permisos al role Admin
        $admin->givePermissionTo([
            //-------------------------------------------------------------------MENU DASH
            'menu_dash',
             //------------------------------------------------------------------DASH botones
             'boton_almacen_menu',
             'categoria_pagina_menu',
             'marca_pagina_menu',
             'producto_pagina_menu',

            'boton_inventario_menu',
            'inventario_pagina_menu',
     
             'boton_compras_menu',
             'proveedor_pagina_menu',             
     
             'boton_ventas_menu',
             'cliente_pagina_menu',
             'arqueo_pagina_menu',
     
             'boton_acceso_menu',
             'usuarios_pagina_menu',
             'permisos_pagina_menu',
     
             'boton_reporte_menu',
             'reporte_almacen_pagina_menu',
             'reporte_ventas_pagina_menu',
     
             'boton_herramienta_menu',
             //'pagina_ayuda_menu',
             //'alerta_pagina_menu',
             //'denominaciones_pagina_menu',
             'pais_pagina_menu',
            //--------------------------------------------------------------------Clientes
            'cliente_pagina',
            //--------------------------------------------------------------------Alertas
            'alerta_pagina', 
            'alerta_crear',
            'alerta_editar',
            //---------------------------------------------------------------------Asignar        
            'asignar_pagina',
            'asignar_sincronizar_todos',
            'asignar_revocar_todos',
            'asignar_marcar',    
            //----------------------------------------------------------------------Brand
            'marca_pagina',
            'marca_crear',          
            'marca_eliminar',
            'marca_editar',
            'marca_buscar',    
            //---------------------------------------------------------------------Cashout
            'dinero_entregado_pagina',
            'dinero_entregado_imprimir',
            'dinero_entregado_detalle',    
            //--------------------------------------------------------------------Category
            'categoria_pagina',
            'categoria_crear',            
            'categoria_eliminar',
            'categoria_editar',
            'categoria_buscar',    
            //---------------------------------------------------------------------Country
            'pais_pagina',
            'pais_crear',            
            'pais_eliminar', 
            'pais_editar',
            'pais_buscar',    
            //-----------------------------------------------------------------------Dash
            'panel_Administrativo_pagina',    
            //---------------------------------------------------------------Denomination
            'denominacion_pagina',            
            'denominacion_buscar',    
            //-----------------------------------------------------------------Department
            'departamento_pagina',    
            //-----------------------------------------------------------------Products
            'producto_pagina',            
            'producto_crear',            
            'producto_eliminar',
            'producto_editar',
            'producto_buscar',            
            //-------------------------------------------------------------------Roles 
            'roles_pagina',            
            'roles_buscar',            
            //-------------------------------------------------------------------Users
            'usuario_pagina',
            'usuario_crear',            
            'usuario_eliminar',
            'usuario_editar',
            'usuario_buscar',                
            //---------------------------------------------------------------proveedor
            'proveedor_pagina',
            'proveedor_crear',            
            'proveedor_eliminar',
            'proveedor_editar',
            'proveedor_buscar',
            //----------------------------------------------------------------Almacen
            'almacen_pagina',
            'boton_registrar_cantidades',
            //---------------------------------------------------------------------Sales
            'venta_pagina',
            'venta_crear',
            //------------------------------------------------------------------Permisos
            'permiso_pagina',         
            'permiso_buscar',
            //-------------------------------------------------------------------Arqueos
            'arqueo_pagina',
            //--------------------------------------------------------Reportes ventas
            'reporte_ventas_pagina',
            'reporte_ventas_pdf',          
            //--------------------------------------------------------Reportes inventario
            'reporte_almacen_pagina',
            'reporte_almacen_pdf'
        ]);
        //---------------------------------------------------------asignar permisos al rol vendedor
        $empleado->givePermissionTo([                
        //---------------------------------------------------------------proveedor
        'proveedor_pagina', 
        'proveedor_buscar', 
        //---------------------------------------------------------------------Cashout
        'dinero_entregado_pagina',
        'dinero_entregado_imprimir',
        'dinero_entregado_detalle',               
        //-----------------------------------------------------------------Products
        'producto_pagina', 
        'producto_buscar',                 
        //---------------------------------------------------------------------Sales
        'venta_pagina',
        'venta_crear',
        //-------------------------------------------------------------------Arqueos
        'arqueo_pagina',
        //--------------------------------------------------------Reportes ventas
        'reporte_ventas_pagina',
        'reporte_ventas_pdf',
        ]);     

        //---------------------------------------------------------asignar permisos al rol almacen
        
        $almacen->givePermissionTo([         
        //----------------------------------------------------------------Almacen
        'almacen_pagina',
        //--------------------------------------------------------Reportes inventario
        'reporte_almacen_pagina',
        'reporte_almacen_pdf'
        ]);





        //asignar rol al usuario admin
        $Admin = User::find(1);
        $Admin->assignRole('Admin');
       

        //asignar rol al usuario empleado
        $Empleado = User::find(2);
        //$uEmpleado->assignRole('Employee');
        $Empleado->assignRole('Vendedor');

        $Almacen = User::find(3);                
        $Almacen->assignRole('Vendedor');

        $Almacen = User::find(4);        
        $Almacen->assignRole('Almacen');
    }
}
