<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} </b>
                </h4>                    
                    <ul class="tabs tab-pills">
                        <li>
                        @can('alerta_crear')
                            <a 
                                style="background: #023E8A!important;" 
                                href="javascript:void(0)"
                                class="tabmenu bg-dark"                            
                                id="button-add"                        
                                data-toggle="modal"
                                data-target="#theModal"
                                title="Actualizar">Agregar
                            </a>
                            @endcan
                        </li>
                    </ul>
                
            </div>
            @can('alerta_buscar')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white text-rigth">CÓDIGO</th> 
                                <th class="table-th text-white text-center">ALERTA INVENTARIO</th>
                                <th class="table-th text-white text-center">FECHA DE CREACIÓN</th> 
                                <th class="table-th text-white text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $alert)
                                <tr>
                                    <td><h6>{{ $alert->id }}</h6></td>
                                    <td><h6 class="text-center">{{ $alert->name }}</h6></td>
                                    <td><h6 class="text-center"><b>{{$alert->created_at}}</b></h6></td>                             
                                    <td class="text-center">
                                        @can('alerta_editar')
                                            <a 
                                            style="background: #023E8A!important;"  
                                                href="javascript:void(0)" 
                                                wire:click="Edit({{ $alert->id }})"
                                                class="btn btn-dark mtmobile" 
                                                id = "button-edit"
                                                title="EDITAR VALOR ALERTA">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('alerta_eliminar')
                                            <a                                            
                                                href="javascript:void(0)"                                            
                                                class="btn btn-danger"
                                                title="ELIMINAR">
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
     @include('livewire.alert.form') 
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        window.livewire.on('alert-show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('alert-updated-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('alert-added-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });

    });



</script>
