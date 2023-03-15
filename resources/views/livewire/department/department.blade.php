<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}}</b>
                </h4>
                @can('departamento_crear')                
                    <ul class="tabs tab-pills">
                        <li>
                            <a 
                                style="background: #023E8A!important;" 
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark" 
                                id="button-add" 
                                onclick="Confirm()"
                                data-toggle="modal" 
                                data-target="#theModal">
                                Agregar
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
            @can('departamento_buscar')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">DEPARTAMENTO</th>                                
                                @can('departamento_actualizar')
                                    <th class="table-th text-white text-center">ACCIONES</th>                                    
                                @endcan
                                <th class="table-th text-white text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $department)
                            <tr>
                                <td><h6>{{$department->name}}</h6></td>                                
                                <td class="text-center">
                                    @can('departamento_editar')
                                        <a 
                                            style="background: #013440!important;" 
                                            href="javascript:void(0)" 
                                            onclick="Confirm()"
                                            class="btn mtmobile" 
                                            id = "button-edit" 
                                            title="Editar departamento">
                                            <i class="fas fa-edit"></i>
                                        </a>                               
                                    @endcan
                                    @can('departamento_eliminar')
                                        <a 
                                            href="javascript:void(0)" 
                                            onclick="Confirm()"
                                            class="btn btn-danger" 
                                            title="No se puede eliminar el departamento">
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
 
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('country-show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('country-added-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('country-updated-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });       
        
    });
    function Confirm() {        
        swal({
            title: 'ACCIÓN NEGADA',
            text: 'NO SE PUEDE REALIZAR ESTA ACCIÓN',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#023E8A',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if (result.value) {
                //window.livewire.emit('deleteRow', id)
                swal.close()
            }

        })
    }
    
</script>

