<div class="row sales layout-top-spacing">	
	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b>{{$componentNames}}</b>
				</h4>
				@can('denominacion_crear')
					<ul class="tabs tab-pills">
						<li>
							<a 
								style="background: #023E8A!important;" 
								href="javascript:void(0)" 
								class="tabmenu bg-dark" 
								id="button-add"
								data-toggle="modal" 
								data-target="#theModal"
								title="Añadir una denominación">
								Agregar
							</a>
						</li>
					</ul>
				@endcan
			</div>
			@can('denominacion_buscar')
				@include('common.searchbox')
			@endcan

			<div class="widget-content">
				
				<div class="table-responsive">
					<table class="table table-bordered table striped mt-1">
						<thead class="text-white" id="table-head" style="background: #023E8A!important;" >
							<tr>
								<th class="table-th text-white">TIPO</th>
								<th class="table-th text-white text-center">VALOR</th>
								<th class="table-th text-white text-center">IMAGEN</th>	
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $coin)
							<tr>
								<td><h6>{{$coin->type}}</h6></td>
								<td ><h6 class="text-center">Bs{{number_format($coin->value,2)}}</h6></td>								
								<td class="text-center">
									<span>
										<img src="{{ asset('storage/denominations/' . $coin->imagen ) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
									</span>
								</td>
								<td class="text-center">								
									@can('denominacion_editar')
										<a
										style="background: #023E8A!important;"
											href="javascript:void(0)" 
											wire:click="Edit({{$coin->id}})"
											class="btn mtmobile btn-dark" 
											id= "button-edit"
											title="Editar deneminación">
											<i class="fas fa-edit"></i>
										</a>
									@endcan

									@can('denominacion_eliminar')
										<a 
											href="javascript:void(0)"
											onclick="Confirm('{{$coin->id}}')" 
											class="btn btn-danger" 
											id="button-delete" 
											title="Eliminar denaminación">
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
	
		 @include('livewire.denominations.form')
 


</div>


<script>
	document.addEventListener('DOMContentLoaded', function(){

		window.livewire.on('item-added', msg =>{
			$('#theModal').modal('hide')
		});
		window.livewire.on('item-updated', msg =>{
			$('#theModal').modal('hide')
		});
		window.livewire.on('item-deleted', msg =>{
			// noty
		});
		window.livewire.on('show-modal', msg =>{
			$('#theModal').modal('show')
		});
		window.livewire.on('modal-hide', msg =>{
			$('#theModal').modal('hide')
		});
		$('#theModal').on('hidden.bs.modal', function (e) {			
			$('.er').css('display','none')			
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