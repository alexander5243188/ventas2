<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName}} | {{$pageTitle}}</b>
                </h4>
                @can('permiso_crear')
                    <ul class="tabs tab-pills">
                        <li>
                            <!--
                            <a 
                                style="background: #023E8A!important;" 
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark"
                                id="button-add"
                                data-toggle="modal" 
                                data-target="#theModal"
                                title="Añadir un permiso">
                                Agregar
                            </a>
                            -->
                        </li>
                    </ul>
                @endcan
            </div>
            @can('permiso_buscar')
                @include('common.searchbox')
            @endcan

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">IDENTIFICADOR</th>
                                <th class="table-th text-white float-left">DESCRIPCIÓN</th>
                                @can('permiso_actualizar')
                                <!--
                                    <th class="table-th text-white text-center">ACCIONES</th>
                                -->
                                @endcan
                                <th class="table-th text-white text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permisos as $permiso)
                            <tr>
                                <td><h6>{{$permiso->id}}</h6></td>
                                <td class="float-left"><h6>{{$permiso->name}}</h6></td>

                             <td class="text-center">
                                @can('permiso_editar')
                                <!--
                                    <a
                                        style="background: #013440!important;"  
                                        href="javascript:void(0)" 
                                        wire:click="Edit({{$permiso->id}})"
                                        class="btn mtmobile" 
                                        id="button-edit"
                                        title="Editar permiso">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                -->
                                @endcan

                                @can('permiso_eliminar')
                                <!--
                                    <a 
                                        href="javascript:void(0)" 
                                        onclick="Confirm('{{$permiso->id}}')" 
                                        class="btn btn-danger" 
                                        id="button-delete"
                                        title="Eliminar permiso">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                -->
                                @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$permisos->links()}}
    </div>

</div>


</div>


</div>

@include('livewire.permisos.form')
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
          


        window.livewire.on('permiso-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('permiso-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('permiso-deleted', Msg => {           
            noty(Msg)
        })
        window.livewire.on('permiso-exists', Msg => {            
            noty(Msg)
        })
        window.livewire.on('permiso-error', Msg => {            
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')            
        })
        window.livewire.on('show-modal', Msg => {
            $('#theModal').modal('show')
        })
              

    });


    function Confirm(id)
    {   

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if(result.value){
                window.livewire.emit('destroy', id)
                swal.close()
            }

        })
    }
    
    

</script>