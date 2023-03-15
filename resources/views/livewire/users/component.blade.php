<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                @can('usuario_crear')
                    <ul class="tabs tab-pills">
                        <li>
                            <a
                                style="background: #023E8A!important;"  
                                href="javascript:void(0)" 
                                class="tabmenu bg-dark" 
                                id="button-add"
                                data-toggle="modal" 
                                data-target="#theModal"
                                title="Añadir nuevo usuario">
                                Registrar nuevo usuario
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
            

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" id="table-head" style="background: #023E8A!important;" >
                            <tr>
                                <th class="table-th text-white">USUARIO</th>
                                <th class="table-th text-white text-center">TELÉFONO</th>
                                <th class="table-th text-white text-center">CORREO ELECTRÓNICO </th>
                                <th class="table-th text-white text-center">ESTADO</th>
                                <th class="table-th text-white text-center">PERFIL</th>
                                <th class="table-th text-white text-center">IMÁGEN</th>
                                
                                    <th class="table-th text-white text-center">ACCIONES</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $r)
                            <tr>
                                <td><h6>{{$r->name}}</h6></td>
                                
                                <td class="text-center"><h6>{{$r->phone}}</h6></td>
                                <td class="text-center"><h6>{{$r->email}}</h6></td>
                                <td class="text-center">
                                    <span class="badge {{ $r->status == 'ACTIVO' ? 'badge-success' : 'badge-danger' }} text-uppercase">{{$r->status}}</span>
                                </td>
                                <td class="text-center text-uppercase">
                                    <h6 class="badge-primary">{{$r->profile}}</h6>
                                    <small><b>Rol:</b>{{implode(',',$r->getRoleNames()->toArray())}}</small>
                                </td>

                                <td class="text-center">
                                 @if($r->image != null) 
                                 <img 
                                    class="card-img-top img-fluid"
                                    id="user-img"                                           
                                    src="{{ asset('storage/users/'.$r->image) }}"                                    
                                 > 
                                 @endif                                  
                             </td>

                             <td class="text-center">
                                @can('usuario_editar')
                                    @if(Auth()->user()->id != $r->id)
                                    <a 
                                        style="background: #013440!important;" 
                                        href="javascript:void(0)" 
                                        wire:click="edit({{$r->id}})"
                                        class="btn mtmobile btn-dark" 
                                        id= "button-edit"
                                        title="Editar datos usuario">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                @endcan
                            
                            @can('usuario_eliminar')
                                @if(Auth()->user()->id != $r->id)
                                    <a 
                                        href="javascript:void(0)" 
                                        onclick="Confirm('{{$r->id}}')" 
                                        class="btn btn-danger" 
                                        id= ""
                                        title="Eliminar usuario">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
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

		 @include('livewire.users.form')
  
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('user-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-deleted', Msg => {           
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg => {           
            $('#theModal').modal('hide')
        })
        window.livewire.on('show-modal', Msg => {           
            $('#theModal').modal('show')
        })
        window.livewire.on('user-withsales', Msg => {           
            noty(Msg)
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
                window.livewire.emit('deleteRow', id)
                swal.close()
            }

        })
    }
</script>