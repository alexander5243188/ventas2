
@can('menu_dash')
<nav class="navbar navbar-expand-lg ">

    <div class="container-fluid">
                    <div class="dropdown">
                        <!-------------------------------------------ALMACEN -->
                        @can('boton_almacen_menu')
                        <button style="background: #023E8A!important;" class="btn dropdown-toggle button-inventario btn-dark" type="button" id="inventario_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            PRODUCTO
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="inventario_Menu">
                        @can('categoria_pagina_menu')
                            <li>
                                <a href="{{url('categories')}}" class="dropdown-item" data-active="true"> 
                                                               
                                    <h6><i class="fas fa-bookmark"></i> Categoria</h6>
                                </a>
                            </li>
                        @endcan                        
                        @can('marca_pagina_menu')
                            <li>                                      
                                <a href="{{url('brands')}}"  class="dropdown-item" >                                   
                                    <h6><i class="fas fa-bookmark"></i> Marca</h6>
                                </a>
                            </li>
                        @endcan    
                        @can('producto_pagina_menu')
                            <li>
                                <a href="{{ url('products') }}" class="dropdown-item" data-active="false">                                    
                                    <h6><i class="fas fa-bookmark"></i> Producto</h6>
                                </a>            
                            </li>
                        @endcan                      
                        </ul>
                        
                    </div>
                    <!-------------------------------------------COMPRAS -->                    
                    <div class="dropdown">
                        @can('boton_compras_menu')
                        <button style="background: #023E8A!important;" class="btn  dropdown-toggle button-compras btn-dark" type="button" id="compras_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 13 16 13 14 16 10 16 8 13 2 13"></polyline><path d="M5.47 5.19L2 13v5a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5l-3.47-7.81A2 2 0 0 0 16.7 4H7.3a2 2 0 0 0-1.83 1.19z"></path></svg>
                            PROVEEDOR
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="compras_Menu">                            
                            @can('proveedor_pagina_menu')  
                            <li>
                                <a href="{{url('proveedor')}}"  class="dropdown-item">                                
                                    <h6><i class="fas fa-bookmark"></i> Proveedor</h6>
                                </a>                               
                            </li>
                        @endcan
                        </ul>                        
                    </div>
                    <!-------------------------------------------INVENTARIO -->                    
                    <div class="dropdown">
                        @can('boton_inventario_menu')
                        <button style="background: #023E8A!important;" class="btn  dropdown-toggle button-inventario btn-dark" type="button" id="inventario_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>
                            INVENTARIO
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="inventario_Menu">                            
                            @can('inventario_pagina_menu')  
                            <li>
                                <a href="{{url('almacen')}}"  class="dropdown-item">                                
                                    <h6><i class="fas fa-bookmark"></i> Almacen</h6>
                                </a>                               
                            </li>
                        @endcan
                        </ul>                        
                    </div>
                    <!-------------------------------------------VENTAS -->
                    <div class="dropdown">
                        @can('boton_ventas_menu')                        
                        <button style="background: #023E8A!important;" class="btn dropdown-toggle button-compras btn-dark" type="button" id="compras_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            DATOS VENTA
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="_Menu"> 
                            @can('cliente_pagina_menu')                       
                            <li>
                                <a href="{{url('client')}}" class="dropdown-item" data-active="true">                                    
                                    <h6><i class="fas fa-bookmark"></i> Cliente</h6>
                                </a>
                            </li>
                            @endcan
                            
                            @can('arqueo_pagina_menu')
                            <li>
                                <a href="{{url('cashout')}}" class="dropdown-item" data-active="true">                                    
                                    <h6><i class="fas fa-bookmark"></i> Arqueo</h6>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    <!-------------------------------------------ACCESO -->
                    <div class="dropdown">
                        @can('boton_acceso_menu')
                        <button style="background: #023E8A!important;" class="btn  dropdown-toggle button-usuario btn-dark" type="button" id="usuario_Menu" data-bs-toggle="dropdown" aria-expanded="false">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            USUARIO
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="usuario_Menu">
                            @can('usuarios_pagina_menu')
                            <li>
                                <a href="{{ url('users') }}" class="dropdown-item" data-active="false">                                    
                                    <h6><i class="fas fa-bookmark"></i> Usuario</h6>
                                </a>
                            </li>
                            @endcan 
                            <!--
                            <li>
                                <a href="{{ url('permisos') }}" class="dropdown-item" data-active="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>Lista de Permisos</span>
                                </a>  
                            </li> -->
                            @can('permisos_pagina_menu')
                            <li>
                                <a href="{{ url('asignar') }}" class="dropdown-item text-danger" data-active="false">                                    
                                    <h6><i class="fas fa-bookmark"></i> Asignar permiso</h6>
                                </a>            
                            </li>
                            @endcan 
                            <!--
                            <li>
                                <a href="{{ url('roles') }}" class="dropdown-item" data-active="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    <span>Roles</span>
                                </a>
                            </li> -->
                           
                        </ul>
                    </div>
                    <!-------------------------------------------REPORTES -->
                    <div class="dropdown">
                        @can('boton_reporte_menu')
                        <button style="background: #023E8A!important;" class="btn  dropdown-toggle button-reportes btn-dark" type="button" id="reportes_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                            REPORTE
                        </button>
                        @endcan 
                        <ul class="dropdown-menu" aria-labelledby="reportes_Menu">
                            @can('reporte_almacen_pagina_menu')
                            <li>                                
                                <a href="reportalmacen"  class="dropdown-item">                                    
                                    <h6><i class="fas fa-bookmark"></i> Reporte almacen</h6>
                                </a>            
                            </li>
                            @endcan
                            @can('reporte_ventas_pagina_menu')
                            <li>                                
                                <a href="reports"  class="dropdown-item">                                    
                                    <h6> <i class="fas fa-bookmark"></i> Reporte ventas</h6>
                                </a>            
                            </li>
                            @endcan
                            
                            <!--
                            <li>
                                <a href="{{url('iva')}}"  class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>Iva</span>
                                </a>            
                            </li> -->
                           <!--
                            <li>
                                <a href="{{url('alert')}}"  class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>Alerta cantidad</span>
                                </a>            
                            </li> -->
                          <!--
                            <li>
                                <a href="{{ url('coins') }}" class="dropdown-item" data-active="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-stop-circle"><circle cx="12" cy="12" r="10"></circle><rect x="9" y="9" width="6" height="6"></rect></svg>
                                    <span>Denominaciones</span>
                                </a>
                            </li> -->
                           
                            <!--
                            <li>
                                <a href="{{url('country')}}"  class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>País</span>
                                </a>
                            <li> -->
                            
                            <!--
                            <li>
                                <a href="{{url('department')}}"  class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>Departamentos</span>
                                </a>
                            </li>  -->
                           
                            <!-- <li>                
                                <a href="{{url('alert')}}"  class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <span>Alerta de inventario</span>
                                </a>
                            </li> -->
                                                   
                        </ul>
                    </div>
                    <!-------------------------------------------AYUDA -->
                    <div class="dropdown"> 
                        @can('boton_herramienta_menu')                       
                        <button style="background: #023E8A!important;" class="btn dropdown-toggle button-inventario btn-dark" type="button" id="inventario_Menu" data-bs-toggle="dropdown" aria-expanded="false">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>
                       
                            HERRAMIENTA
                        </button>
                        @endcan                         
                        <ul class="dropdown-menu" aria-labelledby="inventario_Menu">
                            @can('pais_pagina_menu')
                            <li>
                                <a href="{{url('country')}}" class="dropdown-item" data-active="true">                                    
                                    <h6><i class="fas fa-bookmark"></i> País</h6>
                                </a>
                            </li> 
                            @endcan
                            <!--
                            @can('pagina_ayuda_menu')
                            <li>
                                <a href="#" class="dropdown-item" data-active="true">                                    
                                    <h6><i class="fas fa-bookmark"></i> Ayuda</h6>
                                </a>
                            </li>
                            @endcan
                            -->
                      
                        <!-------------------------------------------------------------------------->
                        </ul>

                    </div>              
    </div> 
   
    @include('livewire.dash.scriptmenu')
</nav>
@endcan
<div>
    <div class="row layout-top-spacing mt-5">
        <div class="col-sm-12 col-md-6">
            <div class="widget widget-chart-one">
                <h4 class="p-3 text-center text-theme-1 font-bold">MAS VENDIDOS</h4>
                <div id="chartTop5">
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="widget widget-chart-one">
                <h4 class="p-3 text-center text-theme-1 font-bold">VENTAS DE LA SEMANA</h4>
                <div id="areaChart">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row pt-5">
        <div class="col-sm-12 ">
            <div class="widget widget-chart-one">
                <h4 class="p-3 text-center text-theme-1 font-bold"> VENTAS ANUALES {{$year}}</h4>
                <div id="chartMonth">
                </div>
            </div>
        </div>
    </div>
    @include('livewire.dash.script')
</div>