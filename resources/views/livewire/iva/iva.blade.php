<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} </b>
                </h4>
                @can('iva_crear')
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
                                <th class="table-th text-white">VALOR DEL IVA</th>
                                <th class="table-th text-white text-center"></th>                              
                                <th class="table-th text-white text-center"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $iva)
                                <tr>
                                    <td><h6>{{ $iva->tax }}</h6></td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                        @can('iva_editar')
                                            <a
                                                style="background: #013440!important;"  
                                                href="javascript:void(0)" 
                                                wire:click="Edit({{ $iva->id }})"
                                                class="btn mtmobile" 
                                                id = "button-edit"
                                                title="EDITAR VALOR DEL IVA">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        
                                        @can('iva_eliminar')
                                            <a                                            
                                                href="javascript:void(0)"
                                                onclick="Confirm(' {{ $iva->id }}')"
                                                class="btn btn-danger"
                                                title="NO SE PUEDE ELIMINAR">
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
        @include('livewire.iva.form')
      
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        window.livewire.on('iva-show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('iva-updated-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });

    });



    function Confirm(id, products) {
        if(products > 0)
        {
            swal('NO SE PUEDE ELIMINAR ES UN VALOR POR DEFECTO')
            return;
        }
        swal({
            title: 'AVISO',
            text: '!NO SE PUEDE ELIMINAR¡',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            showConfirmButton: false,
        }).then(function() {
                swal.close()
        })
    }
     function ConfirmAgregar() {
        swal({
            title: 'AVISO',
            text: '!NO SE PUEDE AÑADIR OTRO VALOR¡',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            showConfirmButton: false,
            customClass: "Custom_Cancel"
        }).then(function() {
                swal.close()
        })
    }
</script>
