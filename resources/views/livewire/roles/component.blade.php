<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentNames}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('roles_crear')
                        
                        <li>
                            <a 
                                style="background: #023E8A!important;" 
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark" 
                                id="button-add"
                                data-toggle="modal" 
                                data-target="#theModal"
                                title="Añadir un rol">
                                Agregar
                            </a>
                        </li>
                        
                    @endcan
                </ul>
            </div>
            @can('roles_buscar')
                @include('common.searchbox')
            @endcan

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">IDENTIFICADOR</th>
                                <th class="table-th text-white text-center">DESCRIPCIÓN</th>
                                @can('roles_actualizar')
                                    <th class="table-th text-white text-center">ACCIONES</th>
                                @endcan
                                <th class="table-th text-white text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td><h6>{{$role->id}}</h6></td>
                                <td class="text-center"><h6 class="badge badge-success">{{$role->name}}</h6></td>

                             <td class="text-center">
                                @can('roles_actualizar')
                                    <a 
                                        style="background: #013440!important;" 
                                        href="javascript:void(0)" 
                                        wire:click="Edit({{$role->id}})"
                                        class="btn mtmobile"
                                        id="button-edit"
                                        title="Editar rol"
                                    >
                                    <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                
                                @can('roles_eliminar')
                                    <a 
                                        href="javascript:void(0)" 
                                        onclick="Confirm('{{$role->id}}')" 
                                        class="btn btn-danger" 
                                        id="button-delete"
                                        title="Eliminar rol"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endcan

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$roles->links()}}
    </div>

</div>


</div>


</div>

@include('livewire.roles.form')
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
          


        window.livewire.on('role-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('role-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('role-deleted', Msg => {           
            noty(Msg)
        })
        window.livewire.on('role-exists', Msg => {            
            noty(Msg)
        })
        window.livewire.on('role-error', Msg => {            
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