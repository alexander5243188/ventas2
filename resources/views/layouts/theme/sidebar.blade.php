<div class="sidebar-wrapper sidebar-theme">
    <nav id="compactSidebar">

        <ul class="menu-categories">
        
        @can('panel_Administrativo_pagina')
        <li class="active">
            <a href="{{url('dash')}}" class="menu-toggle" data-active="true">
                <div class="base-menu">
                    <div class="base-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <span>ADMIN</span>
                </div>
            </a>
        </li>
        @endcan
              

        @can('almacen_pagina')
            <li class="">
                <a href="{{ url('almacen') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line></svg>
                        </div>
                        <span>ALMACEN</span>
                    </div>
                </a>
            </li>
        @endcan

        @can('producto_pagina')
            <li class="">
                <a href="{{ url('proveedor') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        </div>
                        <span>PROVEEDOR</span>
                    </div>
                </a>
            </li>
            @endcan

            @can('producto_pagina')
            <li class="">
                <a href="{{ url('products') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 11.07V12a10 10 0 1 1-5.93-9.14"></path><polyline points="23 3 12 14 9 11"></polyline></svg>
                        </div>
                        <span>PRODUCTOS</span>
                    </div>
                </a>
            </li>
            @endcan

            

            @can('venta_pagina')
            <li class="">
                <a href="{{ url('pos') }}" class="menu-toggle" data-active="false">
                    <div class="base-menu">
                        <div class="base-icons">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                       </div>
                       <span>VENTAS</span>
                   </div>
               </a>
           </li>
           @endcan

@can('arqueo_pagina')
<li class="">
    <a href="{{url('cashout')}}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <span>ARQUEOS</span>
        </div>
    </a>
</li>
@endcan

@can('reporte_ventas_pagina')
<li class="">
    <a href="{{url('reports')}}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
            </div>
            <span>REPORTES VENTAS</span>
        </div>
    </a>
</li>
@endcan

@can('reporte_almacen_pagina')
<li class="">
    <a href="{{url('reportalmacen')}}" class="menu-toggle" data-active="false">
        <div class="base-menu">
            <div class="base-icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
            </div>
            <span>REPORTES ALMACEN</span>
        </div>
    </a>
</li>
@endcan
</ul>



</nav>
</div>

<div id="compact_submenuSidebar" class="submenu-sidebar" style="display: none!important">
</div>