<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} </b>
                </h4>
                @can('estado_crear')
                    <ul class="tabs tab-pills">
                        <li>
                            <a 
                                style="background: #023E8A!important;" 
                                href="javascript:void(0)"
                                class="tabmenu bg-dark"                            
                                id="button-add"                        
                                data-toggle="modal"
                                data-target="#theModal"
                                title="Actualizar">Agregar
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">ESTADO DEL USUARIO</th>                                
                                <th class="table-th text-white"></th>
                                <th class="table-th text-white text-center"></th>                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $status)
                                <tr>
                                    <td><h6 class="badge badge-danger">{{ $status->name }}</h6></td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                        @can('estado_editar')
                                            <a
                                                style="background: #013440!important;"  
                                                href="javascript:void(0)" 
                                                wire:click="Edit({{ $status->id }})"
                                                class="btn mtmobile" 
                                                id = "button-edit"
                                                title="EDITAR ESTADO USUARIO">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('estado_eliminar')
                                            <a                                            
                                                href="javascript:void(0)"
                                                onclick="Confirm(' {{ $status->id }}')"
                                                class="btn btn-danger"
                                                title="ELIMINAR STADO">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links()}}
                </div>
            </div>
        </div>
    </div>   
        @include('livewire.status.form')
      
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        window.livewire.on('status-show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('status-updated-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('status-create-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('status-deleted-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });

    });



    function Confirm(id) {
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
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }

        })
}
     
</script>

