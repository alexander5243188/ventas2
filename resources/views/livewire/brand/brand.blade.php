<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b> {{$componentName}} | {{$pageTitle}}</b>
                </h4>
                @can('marca_pagina')
                    <ul class="tabs tab-pills">
                        <li>
                            <a 
                                style="background: #023E8A!important;"
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark"
                                id="button-add"                            
                                data-toggle="modal" 
                                data-target="#theModal"
                                title="Añadir nueva marca">
                                Registrar nueva marca
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
            @can('marca_buscar')
                @include('common.searchbox')
            @endcan

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;">
                            <tr>
                                <th class="table-th text-white">Registro</th>
                                <th class="table-th text-white">MARCA</th>
                                <th class="table-th text-white text-center">Registrapo por</th>                                                       
                                <th class="table-th text-white text-center">En fecha</th>  
                                <th class="table-th text-white text-center">ACCIONES</th>                                                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $brands)
                            <tr>
                                <td class="text-left"><h6 class="badge badge-primary" >{{$brands->id}}</h6></td>
                                <td class=""><h6>{{ $brands->name }}</h6></td>                                
                                <td class="text-center"><h6>{{ $brands->user }}</h6></td>                          
                                <td class="text-center"><h6>{{ \Carbon\Carbon::parse($brands->created_at)->format('d-m-Y')}}</h6></td>
                                
                                <td class="text-right">
                                    @can('marca_editar')
                                        <a 
                                            style="background: #013440!important;"
                                            href="javascript:void(0)" 
                                            wire:click="Edit({{ $brands->id }})"
                                            class="btn mtmobile btn-dark" 
                                            id = "button-edit"
                                            title="Editar marca">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('marca_eliminar')
                                        <a 
                                            href="javascript:void(0)" 
                                            onclick="Confirm(' {{ $brands->id }}', 
                                            '{{$brands->products->count()}}')"
                                            class="btn btn-danger" 
                                            title="Eliminar marca">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.brand.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('show-modal', msg => {
			$('#theModal').modal('show')
		});        
        window.livewire.on('brand-updated', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('brand-added', msg => {
            $('#theModal').modal('hide')
        });
    });
    function Confirm(id, brands) {
        if(brands > 0)
        {
            swal('NO SE PUEDE ELIMINAR LA MARCA TIENE PRODUCTOS RELACIONADOS')
            return;
        }
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR LA MARCA?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }

        })
    }
</script>

