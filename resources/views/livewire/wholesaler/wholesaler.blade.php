<div class="row sales layout-top-spacing">

	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b>Lista {{$componentName}}</b>
				</h4>
				@can('mayorista_crear')
					<ul class="tabs tab-pills">
						<li>							
							<a  style="background: #023E8A!important;" 
								href="javascript:void(0)" 
								class="tabmenu bg-dark" 
								id="button-add" 
								data-toggle="modal" 
								data-target="#theModal"
								title="Crear un nuevo proveedor">
								Nuevo
							</a>
						
						</li>
					</ul>
				@endcan
			</div>
			@can('mayorista_buscar')
				@include('common.searchbox')
			@endcan
			<div class="widget-content">
				<div class="table-responsive">
					<table class="table table-bordered table striped mt-1">
						<thead class="text-white" id="table-head" style="background: #023E8A!important;" >
							<tr>
								<th class="table-th text-white">NOMBRE</th>
                                <th class="table-th text-white">TELEFONO</th>
                                <th class="table-th text-white">EMAIL</th>
                                <th class="table-th text-white">DIRECCION</th>
								<!-- <th class="table-th text-white">DESCRIPCION</th> -->
                                <!-- <th class="table-th text-white">DEPARTAMENTOS</th> -->
								<th class="table-th text-white text-center">OPCIONES</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($data as $wholesaler)
							<tr>
								
								<td><h6>
								<a
										href="javascript:void(0)" 
										wire:click="Edit({{$wholesaler->id}})" 
										title="Datos mayorista"
								>
									{{$wholesaler->name}}

								</a>
								</h6></td>
                                <td><h6>{{$wholesaler->phone}}</h6></td>
								<td><h6>{{$wholesaler->email}}</h6></td>
                                <td><h6>{{$wholesaler->addres}}</h6></td>
                                <!-- <td><h6>{{$wholesaler->description}}</h6></td> -->
                                <!-- <td><h6>{{$wholesaler->department}}</h6></td> -->
								
								<td class="text-center">
									@can('mayorista_editar')
										<a
											style="background: #013440!important;"  
											href="javascript:void(0)" 
											wire:click="Edit({{$wholesaler->id}})" 
											id="button-edit" 
											class="btn mtmobile btn-dark" 
											title="Editar mayorista">
											<i class="fas fa-edit"></i>
										</a>
									@endcan
									
									@can('mayorista_eliminar') 
											<a 
												href="javascript:void(0)" 
												id="" 
												onclick="Confirm('{{$wholesaler->id}}')" 
												class="btn btn-danger" 
												title="Eliminar mayorista">
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
	
		@include('livewire.wholesaler.form') 
   
	   
</div>


<script>
	document.addEventListener('DOMContentLoaded', function() {

		window.livewire.on('show-modal', msg => {
			$('#theModal').modal('show')
		});
        window.livewire.on('editar', msg => {$('#theModal').modal('show')		});
		window.livewire.on('mostrarDatos', msg => {			$('#theModal').modal('show')		});
		window.livewire.on('wholesaler-added', msg => {
			$('#theModal').modal('hide')
		});
		window.livewire.on('wholesaler-updated', msg => {
			$('#theModal').modal('hide')
		});
		window.livewire.on('wholesaler-deleted', msg => {
			// noty
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