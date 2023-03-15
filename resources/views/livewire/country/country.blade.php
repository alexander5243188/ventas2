<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentNames}}</b>
                </h4>
                @can('pais_crear')
                    <ul class="tabs tab-pills">
                        <li>
                            <a
                                style="background: #023E8A!important;"  
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark"
                                id="button-add" 
                                data-toggle="modal" 
                                data-target="#theModal"
                                title="Añadir un nuevo país">
                                Agregar
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
            @can('pais_buscar')
                @include('common.searchbox')
            @endcan

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">PAIS</th>
                                <th class="table-th text-white text-center">Imagen</th>                               
                                <th class="table-th text-white text-center"></th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $country)
                            <tr>
                                <td><h6>{{$country->name}}</h6></td>
                                <td class="text-center">
                                    <span>
										<img src="{{ asset('storage/countries/' . $country->imagen ) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
									</span>
                                </td>
                                <td class="text-center">
                                    @can('pais_editar')
                                        <a 
                                            style="background: #023E8A!important;"   
                                            href="javascript:void(0)" 
                                            wire:click="Edit( {{$country->id}} )"
                                            class="btn mtmobile btn-dark" 
                                            id = "button-edit" 
                                            title="Editar país">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('pais_eliminar')
                                        <a 
                                            href="javascript:void(0)" 
                                            onclick="Confirm(' {{ $country->id }}' )"
                                            class="btn btn-danger" 
                                            title="Eliminar país">
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
   
        @include('livewire.country.form')
    
 
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
    function Confirm(id, brands) 
    {
        if (brands > 0)
        {
            swal('NO SE PUEDE ELIMINAR EL PAÍS, TIENE MARCAS RELACIONADAS');
            return;
        }
        
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL PAÍS?',
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

