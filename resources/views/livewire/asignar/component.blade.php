<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName}} | {{$pageTitle}}</b>
                </h4>                
            </div>
            
            <div class="widget-content">
                <div class="form-inline">
                    <div class="form-group mr-5">
                        <select wire:model ="role" class="form-control">
                            <option value="Elegir" selected>== Selecciona el Rol ==</option>                           
                            <option value="2" >Vendedor</option>
                            <option value="3" >Almacen</option>                            
                        </select>
                    </div>

                    <button 
                        style="background: #023E8A!important;" 
                        wire:click.prevent="SyncAll()" 
                        id="button-sync-all"
                        type="button" 
                        class="btn mbmobile inblock mr-5 button-sync-all btn-dark">
                        Sincronizar Todos
                    </button>

                    <button 
                        style="background: #023E8A!important;" 
                        onclick="Revocar()" 
                        id="button-revoke-all"
                        type="button" 
                        class="btn mbmobile mr-5 button-revoke-all btn-dark">
                        Revocar Todos
                    </button>
                </div>



                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                                    <tr>
                                        <!-- <th class="table-th text-white text-center">IDENTIFICADOR</th> -->
                                        <th class="table-th text-white float-left">PERMISO</th>
                                        <th class="table-th text-white text-center">CANTIDAD DE ROLES CON EL PERMISO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permisos as $permiso)
                                    <tr class="">
                                        <!--<td><h6 class="text-center">{{$permiso->id}}</h6></td> -->
                                        <td class="float-left">
                                            <div class="n-check">
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox"
                                                    wire:change="syncPermiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name}}' )"
                                                    id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}" 
                                                    class="new-control-input"
                                                    {{ $permiso->checked == 1 ? 'checked' : '' }}
                                                    >
                                                    <span class="new-control-indicator"></span>
                                                    <h6><b>{{ $permiso->name}}</b></h6>
                                                </label>
                                            </div> 
                                        </td>
                                        <td class="text-center">
                                            <h6 class="badge badge-success">{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                            
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


        </div>


    </div>
   
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        window.livewire.on('sync-error', Msg => {
            noty(Msg)
        })
        window.livewire.on('permi', Msg => {
            noty(Msg)
        })
        window.livewire.on('syncall', Msg => {
            noty(Msg)
        })
        window.livewire.on('removeall', Msg => {
            noty(Msg)
        })


    });


    function Revocar()
    {   

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if(result.value){
                window.livewire.emit('revokeall')
                swal.close()
            }

        })
    }

</script>